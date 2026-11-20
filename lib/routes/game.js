const express = require('express')
const router = express.Router()

// https://www.roblox.com/game/report-event?name=ResourcePerformance_Error_funcaptcha_Computer
router.post('/game/report-event', (req, res) => {
  const { name } = req.query

  res.status(200).end()
})

module.exports = router