<?php
  include('header.php');
?>
<div class="row" style="padding-top:5vh;">
    <div class="large-4 push-4 columns panel" data-equalizer>
        <div class="large-12">
            <h1 class="centered">Login</h1>            
        </div>
        <form action="log.php" method="post" style="padding-top:15px;">
            <div class="row">
                <div class="large-12 columns">
                    <label>Username:
                      <input type="text" name="username" placeholder="DB Username" />
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns">
                    <label>Password:
                      <input type="password" name="password" placeholder="DB Password" />
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns">
                    <input type="submit" value="Login">                        
                </div>
            </div>
        </form>
    </div>
</div>
<?php
  include('footer.php');
?>