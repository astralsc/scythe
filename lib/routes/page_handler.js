const express = require('express')
const path = require('path')
const router = express.Router()

// https://www.roblox.com/account/signupredir
router.get('/account/signupredir', (req, res) => {
  const { returnUrl } = req.query

  res.redirect(302, '/')
})

// https://www.roblox.com/Login
router.get('/Login', (req, res) => {
  res.sendFile(path.resolve('www_pages', 'login.html'))
})

// https://www.roblox.com/NewLogin
router.get('/NewLogin', (req, res) => {
  res.sendFile(path.resolve('www_pages', 'login.html'))
})

// https://www.roblox.com/home?nu=true
router.get('/home', (req, res) => {
  const { nu } = req.query

  res.sendFile(path.resolve('www_pages', 'home.html'))
})

module.exports = router