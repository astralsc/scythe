<?php if (strpos($_SERVER['HTTP_USER_AGENT'], 'ROBLOX Android App') === false): // navbar shows if ur on the normal website and not the app ?>
<footer class="container-footer">
    <div class="footer">
        <ul class="row footer-links">
                <li class="col-4 col-xs-2 footer-link">
                    <a href="http://corp.roblox.com/" class="text-footer-nav roblox-interstitial" target="_blank">
                        About Us
                    </a>
                </li>
                <li class="col-4 col-xs-2 footer-link">
                    <a href="http://corp.roblox.com/jobs" class="text-footer-nav roblox-interstitial" target="_blank">
                        Jobs
                    </a>
                </li>
            <li class="col-4 col-xs-2 footer-link">
                <a href="http://blog.roblox.com/" class="text-footer-nav" target="_blank">
                    Blog
                </a>
            </li>
            <li class="col-4 col-xs-2 footer-link">
                <a href="http://corp.roblox.com/parents" class="text-footer-nav roblox-interstitial" target="_blank">
                    Parents
                </a>
            </li>
            <li class="col-4 col-xs-2 footer-link">
                <a href="http://en.help.roblox.com/" class="text-footer-nav roblox-interstitial" target="_blank">
                    Help
                </a>
            </li>
            <li class="col-4 col-xs-2 footer-link">
                <a href="/Info/Privacy.aspx" class="text-footer-nav privacy" target="_blank">
                    Privacy
                </a>
            </li>
        </ul>
        <p class="text-footer footer-note">
            ROBLOX, "Online Building Toy", characters, logos, names, and all related indicia are trademarks of <a target="_blank" href="http://corp.roblox.com/" class="text-link roblox-interstitial">ROBLOX Corporation</a>, ©2016.
            Patents pending. ROBLOX is not sponsored, authorized or endorsed by any producer of plastic building bricks, including The LEGO Group, MEGA Brands, and K'Nex, and no resemblance to the products of these companies is intended.
            Use of this site signifies your acceptance of the <a href="/info/terms-of-service" target="_blank" class="text-link">Terms and Conditions</a>.
        </p>
    </div>
</footer>
<?php endif; ?>