const express = require('express')
const router = express.Router()

// api routes
{
    router.use(require('./routes/page_handler'))
    
    router.use(require('./routes/metrics'))
    router.use(require('./routes/apis'))
    router.use(require('./routes/auth'))
    router.use(require('./routes/locale'))
    router.use(require('./routes/game'))
}

module.exports = router
