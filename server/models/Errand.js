const mongoose = require('mongoose');

const errandSchema = new mongoose.Schema({
  title: {
    type: String,
    required: [true, 'Please provide a title'],
    trim: true,
    maxlength: [100, 'Title cannot be more than 100 characters']
  },
  description: {
    type: String,
    required: [true, 'Please provide a description'],
    maxlength: [1000, 'Description cannot be more than 1000 characters']
  },
  category: {
    type: String,
    required: [true, 'Please select a category'],
    enum: ['Basic errand', 'specialized errands', 'concierge services']
  },
  location: {
    type: String,
    required: [true, 'Please provide a location'],
    trim: true
  },
  salary: {
    type: Number,
    required: [true, 'Please provide a salary'],
    min: [1, 'Salary must be at least 1'],
    max: [100000, 'Salary cannot exceed 100,000']
  },
  experience: {
    type: String,
    required: [true, 'Please select experience level'],
    enum: ['entry', 'intermediate', 'senior']
  },
  customer: {
    type: mongoose.Schema.ObjectId,
    ref: 'User',
    required: true
  },
  status: {
    type: String,
    enum: ['open', 'in_progress', 'completed', 'cancelled'],
    default: 'open'
  },
  deadline: {
    type: Date
  },
  requirements: [String],
  attachments: [String],
  applicationsCount: {
    type: Number,
    default: 0
  }
}, {
  timestamps: true,
  toJSON: { virtuals: true },
  toObject: { virtuals: true }
});

// Virtual for applications
errandSchema.virtual('applications', {
  ref: 'Application',
  localField: '_id',
  foreignField: 'errand',
  justOne: false
});

// Index for search functionality
errandSchema.index({
  title: 'text',
  description: 'text',
  location: 'text'
});

module.exports = mongoose.model('Errand', errandSchema);