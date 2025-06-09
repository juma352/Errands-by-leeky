const mongoose = require('mongoose');

const paymentSchema = new mongoose.Schema({
  application: {
    type: mongoose.Schema.ObjectId,
    ref: 'Application',
    required: true
  },
  amount: {
    type: Number,
    required: [true, 'Please provide payment amount'],
    min: [0.01, 'Amount must be greater than 0']
  },
  method: {
    type: String,
    enum: ['mpesa', 'bank_transfer', 'cash', 'paypal', 'stripe'],
    required: [true, 'Please select payment method']
  },
  status: {
    type: String,
    enum: ['pending', 'completed', 'failed', 'refunded'],
    default: 'pending'
  },
  transactionId: {
    type: String,
    unique: true,
    sparse: true
  },
  stripePaymentIntentId: String,
  notes: String,
  processedAt: Date
}, {
  timestamps: true
});

module.exports = mongoose.model('Payment', paymentSchema);