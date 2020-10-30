function minmasc(palabra){
  var l= palabra;
  var state=" ";
  for(var i = 0; i<l.length; i++){
    if(l==l.toLowerCase()){
      state="contiene solo minusculas";
    } else if(l==l.toUpperCase()){
      state="contiene solo mayusculas";
    }else{
      state="contiene ambas";
    }
  }

  return state;
}
var n= prompt("Ingresa palabra ");
alert(minmasc(n));
