//homepage

$(document).ready(
	function(){
	$("#reg").click(function(){
		$("#layer").fadeIn("slow");
		$("#signUpPopUp").fadeIn("fast");
	});
});

$(document).ready(
	function(){
	$("#signUpClose").click(function(){
		$("#layer").fadeOut("slow");
		$("#signUpPopUp").fadeOut("fast");
	});
});


$(document).ready(
	function(){
	$("#log").click(function(){
		$("#layer").fadeIn("slow");
		$("#signInPopUp").fadeIn("fast");
		
	});
});

$(document).ready(
	function(){
	$("#signInClose").click(function(){
		$("#layer").fadeOut("slow");
		$("#signInPopUp").fadeOut("fast");
		$("#signInForm").slideDown("fast");
		$("#forgottenForm").slideUp("fast");
	});
});

$(document).ready(
	function(){
	$("#forgotten").click(function(){
		$("#signInForm").slideUp("slow");
		$("#forgottenForm").slideDown("slow");
	});
});

$(document).ready(
	function(){
	$("#tornaAlLogin").click(function(){
		$("#signInForm").slideDown("slow");
		$("#forgottenForm").slideUp("slow");
	});
});


//PANNELLO RICERCA 

$(document).ready(
	function(){
	$(".invita").click(function(){
		$("#layer").fadeIn("slow");
		$("#inviteFriendsPopUp").fadeIn("fast");
	});
});

$(document).ready(
	function(){
	$("#inviteFriendsClose").click(function(){
		$("#layer").fadeOut("slow");
		$("#inviteFriendsPopUp").fadeOut("fast");
	});
});


$(document).ready(
	function(){
		$("#arrow").click(function(){
			$("#searchPanel").slideToggle("slow");
		});
	}
);

$(document).ready(
	function(){
		$("#ricerca").click(function(){
			$("#searchPanel").slideToggle("slow");
		});
	}
);

$(document).ready(
	function(){
		$("#overviewArrow").click(function(){
			$("#overviewPic").slideToggle("slow");
		});
	}
);

//POPUP GUSTI
$(document).ready(
	function(){
	$(".imgGusti").click(function(){
		$("#layerGusti").fadeIn("slow");
		$("#popupGusti").fadeIn("fast");
	});
});

$(document).ready(
	function(){
	$("#gustiClose").click(function(){
		$("#layerGusti").fadeOut("slow");
		$("#popupGusti").fadeOut("fast");
	});
});


//PALLINO ATTIVO

$(document).ready(
function(){
	$(".circle").click(function(){
		$(".circle").removeClass("current");
		$(this).addClass("current");
	});
});

$(document).ready(
function(){
	$("#startButton").click(function(){
		$(".circle").removeClass("current");
		$("#cerchio2").addClass("current");
	});
});

$(document).ready(
function(){
	$("#cityButton").click(function(){
		$(".circle").removeClass("current");
		$("#cerchio3").addClass("current");
	});
});

$(document).ready(
function(){
	$("#daysButton").click(function(){
		$(".circle").removeClass("current");
		$("#cerchio4").addClass("current");
	});
});


/*
function attiva(element){
	var x = document.getElementsByClassName("circle");
	for (var i=0;i<x.length;i++) x[i].style.backgroundColor="#C1C1C1";
	element.style.backgroundColor="#2E75B6";
}*/

// CAMBIO IMMAGINI DINAMICO
function changePic(pic){
		var emptyStar="http://www.esniulm.it/tag/img/favoriteStar.png";
		var goldenStar="http://www.esniulm.it/tag/img/yellowStar.png";
		pic.src==emptyStar ? pic.src=goldenStar : pic.src=emptyStar;
		pic.src==emptyStar ? pic.alt="Aggiungi ai preferiti" : pic.alt="Rimuovi dai preferiti";
		pic.src==emptyStar ? pic.title="Aggiungi ai preferiti" : pic.title="Rimuovi dai preferiti";
	}

function giraFreccia(){
	$freccia=document.getElementById("arrow");
	$su="http://www.esniulm.it/tag/img/upArrow.png";
	$giu="http://www.esniulm.it/tag/img/downArrow.png";
	$freccia.src==$giu ? $freccia.src=$su : $freccia.src=$giu;	
}

function giraFrecciaOverview(){
	$freccia=document.getElementById("overviewArrow");
	$suggerimento=document.getElementById("suggerimento");
	$su="http://www.esniulm.it/tag/img/upArrow.png";
	$giu="http://www.esniulm.it/tag/img/downArrow.png";
	if($freccia.src==$su){
		$freccia.src=$giu;
		$suggerimento.innerHTML="espandi finestra";
	} else{
		 $freccia.src=$su;
		 $suggerimento.innerHTML="riduci finestra";
	}
	
}

//GELATO DINAMICO NELLE IMPOSTAZIONI
/*
$(document).ready(
function(){
	$("#changePsw").click(function(){
		$("#defaultCity").removeClass("gelato");
		$(this).addClass("gelato");
	});
});

$(document).ready(
function(){
	$("#defaultCity").click(function(){
		$("#changePsw").removeClass("gelato");
		$(this).addClass("gelato");
	});
});*/
