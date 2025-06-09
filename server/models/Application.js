const mongoose = require('mongoose');

const applicationSchema = new mongoose.Schema({
  errand: {
    type: mongoose.Schema.ObjectId,
    ref: 'Errand',
    required: true
  },
  applicant: {
    type: mongoose.Schema.ObjectId,
    ref: 'User',
    required: true
  },
  expectedSalary: {
    type: Number,
    required: [true, 'Please provide expected salary'],
    min: [1, 'Expected salary must be at least 1']
  },
  coverLetter: {
    type: String,
    maxlength: [500, 'Cover letter cannot exceed 500 characters']
  },
  cv: {
    type: String // URL to uploaded CV
  },
  status: {
    type: String,
    enum: ['pending', 'approved', 'rejected', 'in_progress', 'completed', 'cancelled'],
    default: 'pending'
  },
  assignedAt: Date,
  completedAt: Date,
  rating: {
    score: {
      type: Number,
      min: 1,
      max: 5
    },
    review: String,
    ratedBy: {
      type: mongoose.Schema.ObjectId,
      ref: 'User'
    },
    ratedAt: Date
  },
  tracking: [{
    status: {
      type: String,
      enum: ['assigned', 'in_progress', 'on_route', 'at_location', 'completed', 'delayed', 'cancelled']
    },
    location: String,
    notes: String,
    photoProof: String,
    timestamp: {
      type: Date,
      default: Date.now
    }
  }]
}, {
  timestamps: true
});

// Prevent duplicate applications
applicationSchema.index({ errand: 1, applicant: 1 }, { unique: true });

module.exports = mongoose.model('Application', applicationSchema);