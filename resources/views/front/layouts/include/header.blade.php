<header class="main-header">
    <!-- header-top -->
    <div class="header-top">
        <div class="large-container">
            <div class="top-inner ">
              
                <ul class="info-list clearfix"> 
                    <li>
                        <i class="icon-1"></i>
                        <a href="#">info@healcoins.net</a>
                    </li>
                    <li>
                        <i class="icon-2"></i>
                        Find Nearest Branch
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="large-container">
            <div class="outer-box">
                <div class="logo-box">
                    <div class="shape"></div>
                    <figure class="logo"><a href="{{route('home')}}">
                        <img src="{{asset('front/assets/images/logo.png')}}" alt=""></a>
                    </figure>
                </div>
                <div class="menu-area">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light clearfix">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="current "><a href="{{route('home')}}">Home</a></li> 
                                <li><a href="{{route('about')}}">About Coins</a></li>
                                <li ><a href="{{route('about-portal')}}">About Portal</a></li> 
                                <li ><a href="{{route('global-currency')}}">Global Currency Convertor</a></li> 
                                <li><a href="{{route('contact')}}">Contact Us</a></li> 
                                {{-- <li><a href="{{route('admin/login')}}" target="_blank">Login</a></li>  --}}
                            
                        </div>
                    </nav>
                    
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="large-container">
            <div class="outer-box">
                <div class="logo-box">
                    <div class="shape"></div>
                    <figure class="logo"><a href="#"><img src="{{asset('front/assets/images/logo.png')}}" alt=""></a></figure>
                </div>
                <div class="menu-area">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                  
                </div>
            </div>
        </div>
    </div>
</header>
<div class='btn-container'>
   <a target="_blank" href="{{route('purchase-heal-coin')}}" >
      <button class='btn-set btn--shockwave is-active'>
          Purchase Heal Coins
      </button>
    </a>
  
  </div>
<a target="_blank" href="https://wa.me/+237672628512" class="whatsapp-button"><i class="fab fa-whatsapp"></i></a>
<style>
    .whatsapp-button{
    position: fixed;
    bottom: 15px;
    right: 15px;
    z-index: 99;
    background-color: #25d366;
    border-radius: 50px;
    color: #ffffff;
    text-decoration: none;
    width: 50px;
    height: 50px;
    font-size: 30px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    -webkit-box-shadow: 0px 0px 25px -6px rgba(0,0,0,1);
    -moz-box-shadow: 0px 0px 25px -6px rgba(0,0,0,1);
    box-shadow: 0px 0px 25px -6px rgba(0,0,0,1);
    animation: effect 5s infinite ease-in;
}

@keyframes effect {
    20%, 100% {
        width: 50px;
        height: 50px;
        font-size: 30px;
    }
    0%, 10%{
        width: 55px;
        height: 55px;
        font-size: 35px;
    }
    5%{
        width: 50px;
        height: 50px;
        font-size: 30px;
    }
}


.btn-container {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
  -ms-flex-pack: distribute;
      justify-content: space-around;
}

.btn-set {

    background: #98ff9c;
    border-radius: 5px;
    text-align: center;
    margin: 1.6rem;
    font-size: 1.2rem;
    border: none;
    padding: 20px 30px;
    position: fixed;
    outline: none;
    z-index: 9;
    left: 0;
    bottom: 0;
}
.btn:hover {
background: #208023;
color: #fff
}
.btn--shockwave.is-active {
  -webkit-animation: shockwaveJump 1s ease-out infinite;
          animation: shockwaveJump 1s ease-out infinite;
}
.btn--shockwave.is-active:after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  border-radius: 5px;
  -webkit-animation: shockwave 1s .65s ease-out infinite;
          animation: shockwave 1s .65s ease-out infinite;
}
.btn--shockwave.is-active:before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  border-radius: 5px;
  -webkit-animation: shockwave 1s .5s ease-out infinite;
          animation: shockwave 1s .5s ease-out infinite;
}

@-webkit-keyframes shockwaveJump {
  0% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  40% {
    -webkit-transform: scale(1.08);
            transform: scale(1.08);
  }
  50% {
    -webkit-transform: scale(0.98);
            transform: scale(0.98);
  }
  55% {
    -webkit-transform: scale(1.02);
            transform: scale(1.02);
  }
  60% {
    -webkit-transform: scale(0.98);
            transform: scale(0.98);
  }
  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}

@keyframes shockwaveJump {
  0% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
  40% {
    -webkit-transform: scale(1.08);
            transform: scale(1.08);
  }
  50% {
    -webkit-transform: scale(0.98);
            transform: scale(0.98);
  }
  55% {
    -webkit-transform: scale(1.02);
            transform: scale(1.02);
  }
  60% {
    -webkit-transform: scale(0.98);
            transform: scale(0.98);
  }
  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}
@-webkit-keyframes shockwave {
  0% {
    -webkit-transform: scale(1);
            transform: scale(1);
    box-shadow: 0 0 2px rgba(0, 0, 0, 0.15), inset 0 0 1px rgba(0, 0, 0, 0.15);
  }
  95% {
    box-shadow: 0 0 50px transparent, inset 0 0 30px transparent;
  }
  100% {
    -webkit-transform: scale(2.25);
            transform: scale(2.25);
  }
}
@keyframes shockwave {
  0% {
    -webkit-transform: scale(1);
            transform: scale(1);
    box-shadow: 0 0 2px rgba(0, 0, 0, 0.15), inset 0 0 1px rgba(0, 0, 0, 0.15);
  }
  95% {
    box-shadow: 0 0 50px transparent, inset 0 0 30px transparent;
  }
  100% {
    -webkit-transform: scale(2.25);
            transform: scale(2.25);
  }
}
.btn--jump.is-active {
  -webkit-animation: .4s jump ease infinite alternate;
          animation: .4s jump ease infinite alternate;
}

@-webkit-keyframes jump {
  0% {
    -webkit-transform: scale(1);
            transform: scale(1);
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.15);
  }
  100% {
    -webkit-transform: scale(1.05);
            transform: scale(1.05);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  }
}

@keyframes jump {
  0% {
    -webkit-transform: scale(1);
            transform: scale(1);
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.15);
  }
  100% {
    -webkit-transform: scale(1.05);
            transform: scale(1.05);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  }
}

</style>