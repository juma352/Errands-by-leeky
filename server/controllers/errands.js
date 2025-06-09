const { validationResult } = require('express-validator');
const Errand = require('../models/Errand');
const Application = require('../models/Application');

// @desc    Get all errands
// @route   GET /api/errands
// @access  Public
const getErrands = async (req, res, next) => {
  try {
    let query = {};

    // Search functionality
    if (req.query.search) {
      query.$text = { $search: req.query.search };
    }

    // Filter by category
    if (req.query.category) {
      query.category = req.query.category;
    }

    // Filter by experience
    if (req.query.experience) {
      query.experience = req.query.experience;
    }

    // Filter by salary range
    if (req.query.minSalary || req.query.maxSalary) {
      query.salary = {};
      if (req.query.minSalary) {
        query.salary.$gte = parseInt(req.query.minSalary);
      }
      if (req.query.maxSalary) {
        query.salary.$lte = parseInt(req.query.maxSalary);
      }
    }

    // Only show open errands by default
    if (!req.query.status) {
      query.status = 'open';
    }

    const page = parseInt(req.query.page, 10) || 1;
    const limit = parseInt(req.query.limit, 10) || 10;
    const startIndex = (page - 1) * limit;

    const errands = await Errand.find(query)
      .populate('customer', 'name profile.avatar')
      .sort({ createdAt: -1 })
      .skip(startIndex)
      .limit(limit);

    const total = await Errand.countDocuments(query);

    res.status(200).json({
      success: true,
      count: errands.length,
      total,
      page,
      pages: Math.ceil(total / limit),
      data: errands
    });
  } catch (error) {
    next(error);
  }
};

// @desc    Get single errand
// @route   GET /api/errands/:id
// @access  Public
const getErrand = async (req, res, next) => {
  try {
    const errand = await Errand.findById(req.params.id)
      .populate('customer', 'name email profile')
      .populate({
        path: 'applications',
        populate: {
          path: 'applicant',
          select: 'name profile.avatar ratings'
        }
      });

    if (!errand) {
      return res.status(404).json({
        success: false,
        message: 'Errand not found'
      });
    }

    res.status(200).json({
      success: true,
      data: errand
    });
  } catch (error) {
    next(error);
  }
};

// @desc    Create new errand
// @route   POST /api/errands
// @access  Private (Customer only)
const createErrand = async (req, res, next) => {
  const errors = validationResult(req);
  if (!errors.isEmpty()) {
    return res.status(400).json({
      success: false,
      message: 'Validation failed',
      errors: errors.array()
    });
  }

  try {
    req.body.customer = req.user.id;

    const errand = await Errand.create(req.body);

    res.status(201).json({
      success: true,
      data: errand
    });
  } catch (error) {
    next(error);
  }
};

// @desc    Update errand
// @route   PUT /api/errands/:id
// @access  Private
const updateErrand = async (req, res, next) => {
  try {
    let errand = await Errand.findById(req.params.id);

    if (!errand) {
      return res.status(404).json({
        success: false,
        message: 'Errand not found'
      });
    }

    // Make sure user is errand owner
    if (errand.customer.toString() !== req.user.id && req.user.role !== 'admin') {
      return res.status(401).json({
        success: false,
        message: 'Not authorized to update this errand'
      });
    }

    errand = await Errand.findByIdAndUpdate(req.params.id, req.body, {
      new: true,
      runValidators: true
    });

    res.status(200).json({
      success: true,
      data: errand
    });
  } catch (error) {
    next(error);
  }
};

// @desc    Delete errand
// @route   DELETE /api/errands/:id
// @access  Private
const deleteErrand = async (req, res, next) => {
  try {
    const errand = await Errand.findById(req.params.id);

    if (!errand) {
      return res.status(404).json({
        success: false,
        message: 'Errand not found'
      });
    }

    // Make sure user is errand owner
    if (errand.customer.toString() !== req.user.id && req.user.role !== 'admin') {
      return res.status(401).json({
        success: false,
        message: 'Not authorized to delete this errand'
      });
    }

    await errand.deleteOne();

    res.status(200).json({
      success: true,
      message: 'Errand deleted successfully'
    });
  } catch (error) {
    next(error);
  }
};

// @desc    Get user's errands
// @route   GET /api/errands/my-errands
// @access  Private (Customer only)
const getMyErrands = async (req, res, next) => {
  try {
    const errands = await Errand.find({ customer: req.user.id })
      .populate({
        path: 'applications',
        populate: {
          path: 'applicant',
          select: 'name profile.avatar ratings'
        }
      })
      .sort({ createdAt: -1 });

    res.status(200).json({
      success: true,
      count: errands.length,
      data: errands
    });
  } catch (error) {
    next(error);
  }
};

module.exports = {
  getErrands,
  getErrand,
  createErrand,
  updateErrand,
  deleteErrand,
  getMyErrands
};