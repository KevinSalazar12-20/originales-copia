<?php
    require('Assets/P_Inicio.php');
?>


<article>
    <div id="login">
        
        <form action="javascript:void(0);" method="get">
            
            <fieldset class="clearfix">
                
                <p><span class="fontawesome-user"></span><input  type="text" value="Username" onBlur="if(this.value == '') this.value = 'Username'" onFocus="if(this.value == 'Username') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
                <p><span class="fontawesome-lock"></span><input  type="password"  value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
                <p><input type="submit" value="INGRESAR"></p>

            </fieldset>

        </form>
        
        

    </div> <!-- end login -->
		

	
 </article>


<?php
    require('Assets/P_Final.php');
?>