   <header> 

   	<div class="header-logo">
	      <a href="index.php">Spades</a>
	   </div> 

<div class="nav">
      <ul>
        <li class="home"><a href="#">Home</a></li>
        <li class="tutorials"><a href="#about">About Us</a></li>
        <li class="about"><a href="#services">Events</a></li>
        <li class="contact"><a href="PSIFI/index.html">PSIFI</a>
        <ul>
            <li><a href="PSIFI/#explore">About Event</a></li>
            <li><a href="PSIFI/#event2">Academic Events</a></li>
            <li><a href="PSIFI/#home">Social Events</a></li>
          </ul>
          </li>
        <li class="contact"><a href="PSIFI/index.html">PSIFI Registration</a>
                <ul>
            <li><a href="PSIFI/pdf/registration_guidelines.pdf" target="_blank">Registration Details</a></li>
            
            
            <li><a href="PSIFI/pdf/evalform.pdf" target="_blank">Evaluation Form</a> </li>
            
        </ul>
        <li class="contact"><a href="#contact">Contact Us</a></li>
      </ul>
    </div>

<style>
body {
  margin: 0;
  padding: 0;
  background: #ccc;
}

.nav ul {
  list-style: none;
  background-color: transparent;
  text-align: right;
  padding: 0;
  margin: 0;
	margin-right: 40px;
}

.nav li {
  font-family: 'Oswald', sans-serif;
  font-size: 1.2em;
  line-height: 40px;
  margin-top: 29px;
  text-align: left;
}

.nav a {
  text-decoration: none;
  color: white;
  display: block;
	font-size: 0.6em;
  padding-left: 15px;
  border-bottom: 1px solid #888;
  transition: .3s background-color;
}

.nav a:hover {
  background-color: #005f5f;
}

.nav a.active {
  background-color: #aaa;
  color: #444;
  cursor: default;
}

/* Sub Menus */
.nav li li {
  font-size: .8em;
}

/*******************************************
   Style menu for larger screens

   Using 650px (130px each * 5 items), but ems
   or other values could be used depending on other factors
********************************************/

@media screen and (min-width: 650px) {
  .nav li {
    width: 130px;
    border-bottom: none;
    height: 50px;
    line-height: 50px;
    font-size: 1.4em;
    display: inline-block;
    margin-right: -4px;
  }

  .nav a {
    border-bottom: none;
  }

  .nav > ul > li {
    text-align: center;
  }

  .nav > ul > li > a {
    padding-left: 0;
  }

  /* Sub Menus */
  .nav li ul {
    position: absolute;
    display: none;
    width: inherit;
  }

  .nav li:hover ul {
    display: block;
  }

  .nav li ul li {
    display: block;
  }
}
	   </style>
	</header>
