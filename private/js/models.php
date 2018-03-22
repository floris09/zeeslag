<script>

 function Form() {

  this.form = document.createElement('div');

  this.text = function(id, placeholder){
    var input = document.createElement('input');
    input.type = 'text'; input.id = id; input.placeholder = placeholder;
    this.form.appendChild(input);
  }

  this.textarea = function(id, placeholder){
    var input = document.createElement('input');
    input.type = 'textarea'; input.id = id; input.placeholder = placeholder;
    this.form.appendChild(input);
  }

  this.number = function(id, label){
    var div = document.createElement('div');
    var label = document.createElement('label');
    label.innerHTML = label;
    var input = document.createElement('input');
    input.type = 'number'; input.id = id;
    div.appendChild(label);
    div.appendChild(input);
    this.form.appendChild(div);
  }

  this.date = function(id, label){
    var div = document.createElement('div');
    var label = document.createElement('label');
    label.innerHTML = label;
    var input = document.createElement('input');
    input.type = 'date'; input.id = id;
    div.appendChild(label);
    div.appendChild(input);
    this.form.appendChild(div);
  }

  this.submit = function(onclick, value){
    var submit = document.createElement('button');
    submit.onclick = onclick; submit.value = value;
    this.form.appendChild(submit);
  }

  this.return = function(){
    return this.form;
  }
}

</script>
