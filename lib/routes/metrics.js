const express = require('express')
const router = express.Router()

// https://metrics.roblox.com/v1/thumbnails/metadata
router.get('/v1/thumbnails/metadata', (req, res) => {
  res.status(200).json({
    'logRatio': 0.05
  })
})

module.exports = router