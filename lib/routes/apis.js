const express = require('express')
const router = express.Router()

// https://apis.rbxcdn.com/captcha/v1/metadata
router.get('/captcha/v1/metadata', (req, res) => {
  res.status(200).json({'funCaptchaPublicKeys':{'ACTION_TYPE_ASSET_COMMENT':'63E4117F-E727-42B4-6DAA-C8448E9B137F','ACTION_TYPE_CLOTHING_ASSET_UPLOAD':'63E4117F-E727-42B4-6DAA-C8448E9B137F','ACTION_TYPE_GROUP_JOIN':'63E4117F-E727-42B4-6DAA-C8448E9B137F','ACTION_TYPE_GROUP_WALL_POST':'63E4117F-E727-42B4-6DAA-C8448E9B137F','ACTION_TYPE_SUPPORT_REQUEST':'63E4117F-E727-42B4-6DAA-C8448E9B137F','ACTION_TYPE_WEB_GAMECARD_REDEMPTION':'1B154715-ACB4-2706-19ED-0DC7E3F7D855','ACTION_TYPE_WEB_LOGIN':'476068BF-9607-4799-B53D-966BE98E2B81','ACTION_TYPE_WEB_RESET_PASSWORD':'63E4117F-E727-42B4-6DAA-C8448E9B137F','ACTION_TYPE_WEB_SIGNUP':'A2A14B1D-1AF3-C791-9BBC-EE33CC7A0A6F'}})
})

// https://apis.roblox.com/v1/behaviors/content-rating-logo/content
router.get('/v1/behaviors/content-rating-logo/content', (req, res) => {
  res.status(200).json({
    'displayBrazilRatingLogo':false,
    'displayItalyRatingLogo':false
  })
})

// https://apis.roblox.com/universal-app-configuration/v1/behaviors/content-rating-logo/content
router.get('/universal-app-configuration/v1/behaviors/content-rating-logo/content', (req, res) => {
  res.status(200).json({
    'displayBrazilRatingLogo':false,
    'displayItalyRatingLogo':false
  })
})

module.exports = router