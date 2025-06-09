const mongoose = require('mongoose');

const notificationSchema = new mongoose.Schema({
  recipient: {
    type: mongoose.Schema.ObjectId,
    ref: 'User',
    required: true
  },
  type: {
    type: String,
    enum: ['application_received', 'application_approved', 'application_rejected', 'errand_completed', 'payment_received', 'rating_received'],
    required: true
  },
  title: {
    type: String,
    required: true
  },
  message: {
    type: String,
    required: true
  },
  data: {
    errandId: mongoose.Schema.ObjectId,
    applicationId: mongoose.Schema.ObjectId,
    paymentId: mongoose.Schema.ObjectId
  },
  read: {
    type: Boolean,
    default: false
  },
  readAt: Date
}, {
  timestamps: true
});

module.exports = mongoose.model('Notification', notificationSchema);