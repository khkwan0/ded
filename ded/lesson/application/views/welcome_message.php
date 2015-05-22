        <div id="login_ctr">
            <h1><?php echo $_SERVER['HTTP_HOST']?></h1>

            <div id="body">
                <div>
                    <div>Login here:</div>
                    <div>   
                        <form method="post" action="handlelogin">
                            <table>
                            <tr><td><label>E-mail: </label></td><td><input name="email" id="email" /></td></tr>
                            <tr><td><label>Password: </label></td><td><input name="pass" type="password" /></td></tr>
                            </table>
                            <input type="submit" value="Log in" />
                        </form>
                    </div>
                </div>
                <p><h1>OR</h2></p>
                <div>
                    <a href="register"><button>SIGN UP</button></a>
                </div>
            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
        </div>
