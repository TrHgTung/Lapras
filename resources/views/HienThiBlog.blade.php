
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="{{asset('js/color-modes.js')}}"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Giới thiệu các dịch vụ</title>
    <link rel="icon" href="{{asset('images/logo_original.jpg')}}">
    <link rel="canonical" href="http://127.0.0.1:4401">

    <!-- Day la trang de SEO -->
    <meta name="description" content="Website Đặt xe uy tín.">
    <meta name="keywords" content="thương mại điện tử, đặt xe, dịch vụ thương mại">
    <meta name="robots" content="index, follow">


    <link rel="stylesheet" href="{{asset('@docsearch/css@3')}}">

    <link href="{{asset('bootstrap5/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Favicons -->
    <!-- <link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico"> -->
    <meta name="theme-color" content="#712cf9">


    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

/* Box sizing rules */
*,
*::before,
*::after {
  box-sizing: border-box;
}

/* Remove default margin */
/* body,
h1,
h2,
h3,
h4,
p,
figure,
blockquote,
dl,
dd {
  margin: 0;
} */

/* Remove list styles on ul, ol elements with a list role, which suggests default styling will be removed */
/* ul[role='list'],
ol[role='list'] {
  list-style: none;
} */

/* Set core root defaults */
html:focus-within {
  scroll-behavior: smooth;
}

/* Set core body defaults */
/* body {
  min-height: 100vh;
  text-rendering: optimizeSpeed;
  line-height: 1.5;
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(90deg, var(--grey) 31px, transparent 1px) 50%, linear-gradient(180deg, var(--grey) 31px, var(--blue) 1px) 50%;
  background-size: 32px 32px;
  color: var(--dark);
} */

/* A elements that don't have a class get default styles */
a:not([class]) {
  text-decoration-skip-ink: auto;
}

/* Make images easier to work with */
/* img,
picture {
  max-width: 100%;
  display: block;
} */

/* Inherit fonts for inputs and buttons */
input,
button,
textarea,
select {
  font: inherit;
}

/* Remove all animations, transitions and smooth scroll for people that prefer not to see them */
@media (prefers-reduced-motion: reduce) {
  html:focus-within {
   scroll-behavior: auto;
  }
  
  *,
  *::before,
  *::after {
    animation-duration: 0.01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 0.01ms !important;
    scroll-behavior: auto !important;
  }
}

/* GLOBAL STYLES */
:root {
	--blue: #335DFF;
	--grey: #F5F5F5;
	--grey-d-1: #EEE;
	--grey-d-2: #DDD;
	--grey-d-3: #888;
	--white: #FFF;
	--dark: #222;
}
/* GLOBAL STYLES */







/* CHATBOX */
.chatbox-wrapper {
	position: fixed;
	bottom: 7rem;
	right: 2rem;
	width: 4rem;
	height: 4rem;
}
.chatbox-toggle {
	width: 100%;
	height: 100%;
	background: var(--blue);
	color: var(--white);
	font-size: 2rem;
	display: flex;
	justify-content: center;
	align-items: center;
	border-radius: 50%;
	cursor: pointer;
	transition: .2s;
}
.chatbox-toggle:active {
	transform: scale(.9);
}
.chatbox-message-wrapper {
	position: absolute;
	bottom: calc(100% + 1rem);
	right: 0;
	width: 420px;
	border-radius: .5rem;
	overflow: hidden;
	box-shadow: .5rem .5rem 2rem rgba(0, 0, 0, .1);
	transform: scale(0);
	transform-origin: bottom right;
	transition: .2s;
}
.chatbox-message-wrapper.show {
	transform: scale(1);
}
.chatbox-message-header {
	display: flex;
	align-items: center;
	justify-content: space-between;
	background: var(--white);
	padding: .75rem 1.5rem;
}
.chatbox-message-profile {
	display: flex;
	align-items: center;
	grid-gap: .5rem;
}
.chatbox-message-image {
	width: 3rem;
	height: 3rem;
	object-fit: cover;
	border-radius: 50%;
}
.chatbox-message-name {
	font-size: 18px;
	font-weight: 600;
}
.chatbox-message-status {
	font-size: 16px;
	color: var(--grey-d-3);
}
.chatbox-message-dropdown {
	position: relative;
}
.chatbox-message-dropdown-toggle {
	display: flex;
	justify-content: center;
	align-items: center;
	width: 2.5rem;
	height: 2.5rem;
	font-size: 1.25rem;
	cursor: pointer;
	border-radius: 50%;
}
.chatbox-message-dropdown-toggle:hover {
	background: var(--grey);
}
.chatbox-message-dropdown-menu {
	list-style: none;
	margin: 0;
	position: absolute;
	top: 100%;
	right: 0;
	background: var(--white);
	padding: .5rem 0;
	width: 120px;
	box-shadow: .25rem .25rem 1.5rem rgba(0, 0, 0, .1);
	transform: scale(0);
	transform-origin: top right;
	transition: .2s;
	border-radius: .5rem;
}
.chatbox-message-dropdown-menu.show {
	transform: scale(1);
}
.chatbox-message-dropdown-menu a {
	font-size: .875rem;
	font-weight: 500;
	color: var(--dark);
	text-decoration: none;
	padding: .5rem 1rem;
	display: block;
}
.chatbox-message-dropdown-menu a:hover {
	background: var(--grey);
}
.chatbox-message-content {
	background: var(--grey);
	padding: 1.5rem;
	display: flex;
	flex-direction: column;
	grid-row-gap: 1rem;
	max-height: 300px;
	overflow-y: auto;
}
.chatbox-message-item {
	width: 90%;
	padding: 1rem;
}
.chatbox-message-item.sent {
	align-self: flex-end;
	background: var(--blue);
	color: var(--white);
	border-radius: .75rem 0 .75rem .75rem;
}
.chatbox-message-item.received {
	background: var(--white);
	border-radius: 0 .75rem .75rem .75rem;
	box-shadow: .25rem .25rem 1.5rem rgba(0, 0, 0, .05);
}
.chatbox-message-item-time {
	float: right;
	font-size: 1.25rem;
	margin-top: .5rem;
	display: inline-block;
}
.chatbox-message-bottom {
	background: var(--white);
	padding: .75rem 1.5rem;
}
.chatbox-message-form {
	display: flex;
	align-items: center;
	background: var(--grey);
	border-radius: .5rem;
	padding: .5rem 1.25rem;
}
.chatbox-message-input {
	background: transparent;
	outline: none;
	border: none;
	resize: none;
	scrollbar-width: none;
}
.chatbox-message-input::-webkit-scrollbar {
	display: none;
}
.chatbox-message-submit {
	font-size: 16px;
	color: var(--blue);
	background: transparent;
	border: none;
	outline: none;
	cursor: pointer;
}
.chatbox-message-no-message {
	font-size: 18px;
	font-weight: 600;
	text-align: center;
}
/* CHATBOX */

/* BREAKPOINTS */
@media screen and (max-width: 576px) {
	.chatbox-message-wrapper {
		width: calc(100vw - 2rem);
	}
	.chatbox-wrapper {
		bottom: 1rem;
		right: 1rem;
	}
}
/* BREAKPOINTS */
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>

    
  </head>
  <body>
    <div class="container">
    <div class="chatbox-wrapper">
						<div class="chatbox-toggle">
							<i class='bx bx-message-dots'></i>
						</div>
						<div class="chatbox-message-wrapper">
							<div class="chatbox-message-header">
								<div class="chatbox-message-profile">
									<img src="{{asset('images/logo_original.jpg')}}" alt="" class="chatbox-message-image">
									<div>
										<h4 class="chatbox-message-name">LAPRAS</h4>
										<p class="chatbox-message-status">Sẽ trả lời bạn sau ít phút (Tính năng chưa hoàn thiện)</p>
									</div>
								</div>
								<div class="chatbox-message-dropdown">
									<i class='bx bx-dots-vertical-rounded chatbox-message-dropdown-toggle'></i>
									<ul class="chatbox-message-dropdown-menu">
										<li>
											<a href="#">Search</a>
										</li>
										<li>
											<a href="#">Report</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="chatbox-message-content">
								<h4 class="chatbox-message-no-message">Chưa có tin nhắn gì hết! </h4>
								<p class="">(Hãy nhắn kèm với họ tên/username/e-mail để được giải quyết vấn đề của riêng bạn nha)</p>
							</div>
							<div class="chatbox-message-bottom">
								<form action="#" class="chatbox-message-form">
									<textarea rows="1" placeholder="Nhắn gì đó với Neko Store..." class="chatbox-message-input"></textarea>
									<button type="submit" class=" btn btn-sm btn-primary chatbox-message-submit">Gửi</button>
								</form>
							</div>
						</div>
					</div>
    </div>
    <div>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
      <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
              id="bd-theme"
              type="button"
              aria-expanded="false"
              data-bs-toggle="dropdown"
              aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
      </button>
      <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#sun-fill"></use></svg>
            Light
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
            Dark
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
        <li>
          <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
            <svg class="bi me-2 opacity-50" width="1em" height="1em"><use href="#circle-half"></use></svg>
            Auto
            <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
          </button>
        </li>
      </ul>
    </div>

    
<header data-bs-theme="dark">
  <div class="collapse text-bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4>Giới thiệu</h4>
          <p class="text-body-secondary">Đội phát triển mã nguồn: GitHub/TrHgTung</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4>Trao đổi source</h4>
          <ul class="list-unstyled">
            <li><a href="https://www.youtube.com/@TungSupport" target="_blank" class="text-white">Bình luận trên Youtube (để được hỗ trợ)</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark ">
    <div class="container">
      <a href="{{URL::to('/')}}" class="">
        <strong>< Quay lại</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light fw-bold">Blogs</h1>
        <p class="lead text-body-secondary">Đây là site gồm các bài viết ngắn để giới thiệu các dịch vụ thương mại.</p>
        <!-- <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p> -->
      </div>
    </div>
  </section>

  <div class="album py-5 bg-body-tertiary">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      @foreach($getAllBlogs as $getb)
      @if($getb->status == '1')
        <div class="col">
          <div class="card shadow-sm">
            <img src="{{asset('/storage/'.$getb->LinkThumbnail )}}" class="bd-placeholder-img card-img-top" width="100%" height="225" aria-label="{{$getb->TieuDe}}" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"><strong>{{$getb->TieuDe}}</strong></text></img>
            <div class="card-body">
              <p class="card-text"><i>{{$getb->NoiDung}}</i>.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="{{URL::to('/lichdatxe')}}" class="btn btn-sm btn-outline-secondary">Trải nghiệm ngay!</a>
                </div>
                <small><i>Yêu cầu đăng nhập!</i></small>
              </div>
            </div>
          </div>
        </div>
        @else
        @endif
      @endforeach
        
  </div>
    </div>

</main>

<footer class="text-body-secondary py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Cuộn lên đầu trang</a>
    </p>
    <p class="mb-1">GitHub/TrHgTung (Hoàng Tùng) © 2025</p>
    <p class="mb-0">Cần được hỗ trợ? Hãy đi đến <a href="{{URL::to('/phanhoi')}}">trang phản hồi!</a> </p>
  </div>
</footer>
<script src="{{asset('bootstrap5/bootstrap.bundle.min.js')}}"></script>
<script>
  const textarea = document.querySelector('.chatbox-message-input')
const chatboxForm = document.querySelector('.chatbox-message-form')

textarea.addEventListener('input', function () {
	let line = textarea.value.split('\n').length

	if(textarea.rows < 6 || line < 6) {
		textarea.rows = line
	}

	if(textarea.rows > 1) {
		chatboxForm.style.alignItems = 'flex-end'
	} else {
		chatboxForm.style.alignItems = 'center'
	}
})



// TOGGLE CHATBOX
const chatboxToggle = document.querySelector('.chatbox-toggle')
const chatboxMessage = document.querySelector('.chatbox-message-wrapper')

chatboxToggle.addEventListener('click', function () {
	chatboxMessage.classList.toggle('show')
})



// DROPDOWN TOGGLE
const dropdownToggle = document.querySelector('.chatbox-message-dropdown-toggle')
const dropdownMenu = document.querySelector('.chatbox-message-dropdown-menu')

dropdownToggle.addEventListener('click', function () {
	dropdownMenu.classList.toggle('show')
})

document.addEventListener('click', function (e) {
	if(!e.target.matches('.chatbox-message-dropdown, .chatbox-message-dropdown *')) {
		dropdownMenu.classList.remove('show')
	}
})







// CHATBOX MESSAGE
const chatboxMessageWrapper = document.querySelector('.chatbox-message-content')
const chatboxNoMessage = document.querySelector('.chatbox-message-no-message')

chatboxForm.addEventListener('submit', function (e) {
	e.preventDefault()

	if(isValid(textarea.value)) {
		writeMessage()
		setTimeout(autoReply, 1000)
	}
})



function addZero(num) {
	return num < 10 ? '0'+num : num
}

function writeMessage() {
	const today = new Date()
	let message = `
		<div class="chatbox-message-item sent">
			<span class="chatbox-message-item-text">
				${textarea.value.trim().replace(/\n/g, '<br>\n')}
			</span>
			<span class="chatbox-message-item-time">${addZero(today.getHours())}:${addZero(today.getMinutes())}</span>
		</div>
	`
	chatboxMessageWrapper.insertAdjacentHTML('beforeend', message)
	chatboxForm.style.alignItems = 'center'
	textarea.rows = 1
	textarea.focus()
	textarea.value = ''
	chatboxNoMessage.style.display = 'none'
	scrollBottom()
}

function autoReply() {
	const today = new Date()
	let message = `
		<div class="chatbox-message-item received">
			<span class="chatbox-message-item-text">
				Cảm ơn bạn đã chat với chúng tôi! Lapras sẽ giải đáp thắc mắc của bạn sớm nhất có thể nha!  Hoặc comment liên hệ <a href="https://www.youtube.com/@TungSupport" target="_blank">địa chỉ này</a> để được giải đáp trong vòng thời gian ngắn hơn
			</span>
			<span class="chatbox-message-item-time">${addZero(today.getHours())}:${addZero(today.getMinutes())}</span>
		</div>
	`
	chatboxMessageWrapper.insertAdjacentHTML('beforeend', message)
	scrollBottom()
}

function scrollBottom() {
	chatboxMessageWrapper.scrollTo(0, chatboxMessageWrapper.scrollHeight)
}

function isValid(value) {
	let text = value.replace(/\n/g, '')
	text = text.replace(/\s/g, '')

	return text.length > 0
}
</script>

    </body>
</html>
