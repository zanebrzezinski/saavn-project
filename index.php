<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">

    <script src="main.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <title></title>
  </head>
  <body>

    <div id="login">
      <div class="container" >
        <div class="greeting">
          <h1>Hello.</h1>
          <h2>Ready to go?</h2>
        </div>
        <div class="form-container">
          <form id="form" action="index.html" method="post">
            <div class="">
              <input id="first" type="text" name="first" placeholder="First" value="">
            </div>
            <div class="">
              <input id="last" type="text" name="last" placeholder="Last" value="">
            </div>
            <div class="">
              <input id="email" type="email" name="email" placeholder="Email" value="">
            </div>
            <div class="">
              <input id="password" type="password" name="password" placeholder="Password" value="">
            </div>
            <div class="select-ctr">
              <div class="inline">
                <select id="gender" form="form" class="" name="gender">
                  <option value="" disabled selected>Gender</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Other">Other</option>
                </select>
                <i class="material-icons">
                  keyboard_arrow_down
                </i>
              </div>
              <div class="inline">
                <select id="birthYear" form="form" class="" name="birthYear">
                  <option value="" disabled selected>Birth Year</option>
                  <?php for ($i=2010; $i > 1899; $i--) {
                    echo '<option value="' . $i .'">'. $i .'</option>';
                  } ?>
                </select>
                <i class="material-icons">
                  keyboard_arrow_down
                </i>
              </div>
            </div>
            <button class="submit" type="submit" name="button" value="Submit">Let's Go</button>
          </form>
        </div>
      </div>
      <div class="footer-ctr">
        <div class="footer"></div>
      </div>
    </div>

    <div class="" id="loading">
      <div class="spinner">
        <h3>Just a second while we get your info.</h3>
        <i class="material-icons note pulse-1">
          music_note
        </i>
        <i class="material-icons note pulse-2">
          music_note
        </i>
        <i class="material-icons note pulse-3">
          music_note
        </i>
      </div>
    </div>

    <div id="info">
      <div class="header"></div>
      <div class="container">
        <h1>Boom.</h1>
        <h2><span class="top-artist">Taylor Swift</span> is #1</h2>
        <div class="top-chart">
          <div class="hero">
            <div class="hero-img"></div>
            <div class="hero-info">
              <div class="hero-left">
                <div class="hero-digit">
                  1
                </div>
                <div class="song-info">
                  <div class="song">

                  </div>
                  <div class="top-artist">

                  </div>
                </div>
              </div>
              <div class="hero-right">
                <div class="plays">

                </div>
                <div class="play-word">
                  Plays
                </div>
              </div>
            </div>
          </div>
          <div class="grid-container">
            <div class="grid">
              <div class="row">
                <div class="grid-block"><span>2</span></div>
                <div class="grid-block"><span>3</span></div>
                <div class="grid-block"><span>4</span></div>
              </div>
              <div class="row">
                <div class="grid-block"><span>5</span></div>
                <div class="grid-block"><span>6</span></div>
                <div class="grid-block"><span>7</span></div>
              </div>
              <div class="row">
                <div class="grid-block"><span>8</span></div>
                <div class="grid-block"><span>9</span></div>
                <div class="grid-block"><span>10</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
