# sso-php-session
Simple SSO PHP based on session

Concept:
<ul>
<li>While session empty go to login page with sso-manager, while session not empty go to the last record session url.</li>
<li>When logout, sso-manager redirect to every record url stored in session then sso-client destroy local session and back to sso-manager until all url stored empty.</li>
</ul>
How to use:
<ul>
<li><strong>include 'sso_manager.php';</strong> and <strong>is_login();</strong> to your first line login page.</li>
<li>Call <strong>sso_login(url_to_main_page);</strong> when user login success direct to url main page.</li>
<li>In main page first line <strong>include 'sso_client.php';</strong> then Call <strong>sso_login(url_to_login_page);</strong>. In other system (other web page) just do like that, <strong>include 'sso_client.php';</strong> and call <strong>sso_login(url_to_login_page);</strong></li>
<li>For log out page just add <strong>include 'sso_manager.php';</strong> and call <strong>sso_logout();</strong></li>
</ul>
