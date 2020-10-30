function palindrome(numero){
  var l= numero;
  var par="";
  if(l%2==0){
    par="es par";
  }
  else
    par="no es par";

  return par;
}
var n= prompt("Ingresa numero entero");
alert(palindrome(n));
