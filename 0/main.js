$(document).ready(function () {
  $(".preview").hide();

  var clickText = 0;
  $(".sideBar h1").click(function (e) {
    e.preventDefault();
    clickText++;
    $(".notice").text("There's nothing man, Chill!");
    $(".notice").fadeIn(150);
    if (clickText >= 4 && clickText < 7) {
      $(".notice").text("Chill man, leave it");
    } else if (clickText >= 7) {
      $(".notice").text("Stop playing with it");
    }
    setTimeout(() => {
      $(".notice").fadeOut();
    }, 1900);
  });
  // setTimeout(() => {
  //   $(".headBtnBlock").fadeIn(200);
  // }, 5100);

  //   typed js
  // function typeAnim(classes, delay, cursor, ...text) {
  //   let typed = new Typed(classes, {
  //     strings: text,
  //     smartBackspace: true,
  //     typeSpeed: 20,
  //     startDelay: delay,
  //     showCursor: cursor,
  //   });
  // }

  // typeAnim(".welcome ", 0, false, "আসসলামু আলাইকুম ,");
  // typeAnim(".arifText ", 400, false, "<span class = 'arif'> চলো স্বপ্ন ছুঁই... </span>");
  // typeAnim(".webDesign ", 900, false, "");
  // typeAnim(
  //   ".headText ",
  //   1300,
  //   false,
  //   ""
  // );
  let typed = new Typed(".aboutType ", {
    strings: [
      "web designer",
      "web developer",
      "freelancer",
      "gamer",
      "youtuber",
    ],
    smartBackspace: true,
    typeSpeed: 70,
    backSpeed: 40,
    loop: true,
  });

  //   contact
  $(".contactLink").click(function (e) {
    e.preventDefault();
    $(".contact").fadeIn(200);
  });
  $(".contact .fa-times").click(function (e) {
    e.preventDefault();
    $(".contact").fadeOut(200);
  });
  $(document).scroll(function () {
    $(".contact").fadeOut(200);
  });
  noticeBtn(".contactLink", "still upgrading");

  function noticeBtn(cssval, message) {
    $(cssval).click(function (e) {
      e.preventDefault();
      $(".notice").text(message);
      $(".notice").fadeIn(150);
      setTimeout(() => {
        $(".notice").fadeOut();
      }, 2500);
    });
  }
  noticeBtn(".git", "my github account isn't so good. please wait some time");

  noticeBtn(".insta", "i don't click photo's. sorry");

  //  circle
  function circle(css, value) {
    $(css).circleProgress({
      startAngle: -4,
      value: value,
      size: 150,
      fill: {
        gradient: ["#ff0000", "#900e0e"],
      },
      emptyFill: "#2f2d2dad",
    });
  }

  circle(".html", 0.85);
  circle(".css", 0.7);
  circle(".js", 0.65);
  circle(".scss", 0.7);
  circle(".jquery", 0.75);
  circle(".node", 0.6);
  circle(".react", 0.65);
  $("#works img").click(function (e) {
    e.preventDefault();
    var attr = $(this).attr("src");
    console.log(attr);
    $(".preview img").attr("src", attr);
    $(".preview").fadeIn(70);
  });

  $(".preview i").click(function (e) {
    e.preventDefault();
    $(".preview").fadeOut(100);
  });

  // nav btn
  $("nav .fas").click(function (e) {
    e.preventDefault();
    $("nav .links").css("top", "0");
  });

  // jq scrool
  $(document).scroll(function () {
    $(".preview").fadeOut(50);
    $("nav .links").css("top", "-100%");
    var scroll = $(document).scrollTop();
    if (scroll !== 0) {
      // up arrow
      $(".up .fa-arrow-up").fadeIn();
      $(".up .fa-arrow-up").click(function (e) {
        e.preventDefault();
        $(document).scrollTop(0);
      });
    } else {
      $(".up .fa-arrow-up").fadeOut(100);
    }
    if (scroll >= 246) {
      $(".headerNav nav").addClass("navScroll");
    } else {
      $(".headerNav nav").removeClass("navScroll");
    }
  });
});
