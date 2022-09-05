const btn = document.getElementById('btn');
const inputs = document.querySelectorAll('.input input');
const inputDiv = document.querySelectorAll('.input');
const icons = document.querySelectorAll('.input i');
const inputPhone = document.getElementById('phone');
function checkInput(){
  for(let i = 0 ; i< inputs.length; i++){
    if (inputs[i].value === ''){
      document.forms[0].onsubmit = e => e.preventDefault();
      inputDiv[i].classList.add("error");
      icons[i].classList.remove(icons[i].getAttribute('data-class'));
      icons[i].classList.add('fa-circle-exclamation');
    }
    else{
      inputDiv[i].classList.remove('error')
      icons[i].classList.remove('fa-circle-exclamation');
      icons[i].classList.add(icons[i].getAttribute('data-class'));
    }
  }
}
btn.addEventListener('click', checkInput)

