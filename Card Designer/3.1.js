function addText()
{
    document.getElementById('name').innerHTML = document.getElementById('name_inp').value;
    document.getElementById('fio').innerHTML = document.getElementById('fio_inp').value;
    document.getElementById('dolj').innerHTML = document.getElementById('dolj_inp').value;
    document.getElementById('tel').innerHTML = document.getElementById('tel_inp').value;
    document.getElementById('email').innerHTML = document.getElementById('email_inp').value;
    document.getElementById('adress').innerHTML = document.getElementById('adress_inp').value;
    if (document.getElementById("opt1").checked){
        let txt = document.getElementById("fio");
        txt.style.textAlign = "left"
    }
    if (document.getElementById("opt2").checked){
      let txt2 = document.getElementById("fio");
      txt2.style.textAlign = "center"
    }
    if (document.getElementById("opt3").checked){
      let txt3 = document.getElementById("fio");
      txt3.style.textAlign = "right"
    }
    if (document.getElementById("opt1_1").checked){
      let txt = document.getElementById("dolj");
      txt.style.textAlign = "left"
    }
    if (document.getElementById("opt2_2").checked){
      let txt2 = document.getElementById("dolj");
      txt2.style.textAlign = "center"
    }
    if (document.getElementById("opt3_3").checked){
      let txt3 = document.getElementById("dolj");
      txt3.style.textAlign = "right"
    }

    if (document.getElementById("size_opt_1").checked){
      let txt = document.getElementById("fio");
      txt.style.fontSize = "24px"
  }
  if (document.getElementById("size_opt_2").checked){
    let txt2 = document.getElementById("fio");
    txt2.style.fontSize = "26px"
  }
  if (document.getElementById("size_opt_3").checked){
    let txt3 = document.getElementById("fio");
    txt3.style.fontSize = "28px"
  }
  if (document.getElementById("size_opt_1_1").checked){
    let txt = document.getElementById("dolj");
    txt.style.fontSize = "14px"
  }
  if (document.getElementById("size_opt_2_2").checked){
    let txt2 = document.getElementById("dolj");
    txt2.style.fontSize = "16px"
  }
  if (document.getElementById("size_opt_3_3").checked){
    let txt3 = document.getElementById("dolj");
    txt3.style.fontSize = "18px"
  }

  if (document.getElementById("email_check").checked){
    let txt2 = document.getElementById("email");
    txt2.style.display = "block"
  }
  else{
    let txt2 = document.getElementById("email");
    txt2.style.display = "none"
  }
  if (document.getElementById("adress_check").checked){
    let txt3 = document.getElementById("adress");
    txt3.style.display = "block"
  }
  else{
    let txt3 = document.getElementById("adress");
    txt3.style.display = "none"
  }

  if (document.getElementById("color1").checked){
    let txt3 = document.getElementById("fio");
    txt3.style.color = "black"
  }
  if (document.getElementById("color2").checked){
    let txt3 = document.getElementById("fio");
    txt3.style.color = "blue"
  }
  if (document.getElementById("color3").checked){
    let txt3 = document.getElementById("fio");
    txt3.style.color = "red"
  }
  if (document.getElementById("color4").checked){
    let txt3 = document.getElementById("fio");
    txt3.style.color = "green"
  }
  if (document.getElementById("color5").checked){
    let txt3 = document.getElementById("fio");
    txt3.style.color = "orange"
  }
  if (document.getElementById("color6").checked){
    let txt3 = document.getElementById("fio");
    txt3.style.color = "rgb(188, 27, 156)"
  }

  if (document.getElementById("color1_1").checked){
    let txt3 = document.getElementById("dolj");
    txt3.style.color = "#707070"
  }
  if (document.getElementById("color2_2").checked){
    let txt3 = document.getElementById("dolj");
    txt3.style.color = "#090909"
  }
  if (document.getElementById("color3_3").checked){
    let txt3 = document.getElementById("dolj");
    txt3.style.color = "rgb(46, 45, 45)"
  }
  if (document.getElementById("color4_4").checked){
    let txt3 = document.getElementById("dolj");
    txt3.style.color = "rgb(94, 94, 94)"
  }
  if (document.getElementById("color5_5").checked){
    let txt3 = document.getElementById("dolj");
    txt3.style.color = "rgb(152, 152, 152)"
  }
  if (document.getElementById("color6_6").checked){
    let txt3 = document.getElementById("dolj");
    txt3.style.color = "rgb(196, 196, 196)"
  }

  document.getElementById('tel2').innerHTML = document.getElementById('tel_inp2').value;

}
function addTel()
{
  pol = document.getElementById("tel_inp2")
  pol2 = document.getElementById("tel2")
  if (pol.style.display = "none"){
    pol.style.display = "block"
    pol2.style.display = "block"
  }
}