<style type="text/css">
	body {
  margin: 0;
}

td, p {
  font-size: 13px;
  color: #878787;
}
ul {
  margin: 0 0 10px 25px;
  padding: 0;
}
li {
  margin: 0 0 3px 0;
}
h1, h2 {
  color: black;
}
h1 {
  font-size: 25px;
}
h2 {
  font-size: 20px;
}
a {
  color: #2F82DE;
  font-weight: bold;
  text-decoration: none;
}

.entire-page {
  width: 100%;
  padding: 20px 0;
  font-family: 'Lucida Grande', 'Lucida Sans Unicode', Verdana, sans-serif;
  line-height: 1.5;
}

.email-body {
  max-width: 600px;
  min-width: 320px;
  margin: 0 auto;
  background: white;
  border-collapse: collapse;
  border-style: solid;
  border-width: 1px;
  border-color: #CFD8DC;
  img {
    max-width: 100%;
  }
}

.email-header {
  background:#CFD8DC; 
  padding: 17px;
}

.news-section {
  padding: 20px 30px;
}

.footer {
  background: #eee;
  padding: 10px;
  font-size: 10px;
  text-align: center;
}

.btn {
  border-radius: 5px;
  padding: 15px 25px;
  font-size: 17px;
  text-decoration: none;
  margin: 20px;
  color: #fff;
  position: relative;
  display: inline-block;
}

.blue {
  background-color: #55acee;
  box-shadow: 0px 5px 0px 0px #3C93D5;
}

.blue:hover {
  background-color: #6FC6FF;
}
</style>
<table class="entire-page">
    <tr>
        <td>
            <table class="email-body">
                <tr>
                    <td class="email-header">
                        <a href="#">
              <img src="http://app.nextbook.cf/assets/img/logo1.png" style="height:60;width:190px" alt="Nextbook Logo">
            </a>
                    </td>
                </tr>
                <tr>
                    <td class="news-section">
                        <h1 style="text-align: center"> Account Activation</h1>
                        <!-- <a href="https://blog.codepen.io/documentation/pro-features/pro-teams/"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/t-1/codepen-team.130433.png"></a> -->
                        <p>&emsp; Halo, <?php echo $usern ?>. Terima kasih telah mendaftar di layanan nextbook. Klik link di bawah ini untuk mengaktifkan akun anda. Anda dapat menggunakan akun anda untuk login di layanan web dan mobile kami. Dengan senang hati kami siap menerima feedback dari anda. Bila masih ada pertanyaan silahkan membalas email ini secara langsung melalui client area. Kami akan memberikan respon terbaik untuk anda.</p>
                        <center><a href="<?php echo $link ?>" class="btn blue" style="height:20px">Confirm Your Account</a></center>
                    </td>
                </tr>
                <tr>
                    <td class="footer">
                        Nextbook Support 2017
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>