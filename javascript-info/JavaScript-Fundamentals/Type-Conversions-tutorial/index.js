/**
 * Type Conversions :-
 * Most of the time, operators and functions automatically convert the values given to them to the right type.
 * For example, alert automatically converts any value to a string to show it. Mathematical operations convert values to numbers.
 */
 alert("Hello"); //Automated conversion type to string
alert(12345); //Automated conversion type to string
alert(['riki', 'dhiman']); //Automated conversion type to string
alert(Object.entries({'name':"riki", 'sirname': "dhiman"})); //forcelly conversion object to string using entries property of Object
alert(null); //Automated conversion to string
alert(undefined); //Automated conversion type to string


/**
 * Using type Conversions , you can change the type as  you want
 */
//For instance :-
/**
 * String Conversion
 */
console.log(String(true));//result true
console.log(String(1232)); //result 1234
console.log(String(['hello', 'world'])); //result hello,world
console.log(String(['hello', 'world'] + [','] + ['New', 'world'])); //result hello,world,New,world
console.log(String({1:'rahul', 2: 'thakur'})); //result [object Object]
console.log(String(null)); //result null
console.log(String(undefined)); //result console.log(String(undefined)); //result true



/**
 * Numeric Conversion
 */
 console.log(Number(true)); //1
 console.log(Number(1232)); //1232
 console.log(Number(['hello', 'world'])); //NaN
 console.log(Number({1:'rahul', 2: 'thakur'})); //NaN
 console.log(Number(null)); //0
 console.log(Number(undefined)); //NaN
 console.log(Number('hello world'));// NaN

 /**
  * Boolean Conversion
  */
  console.log(Boolean(true)); //true
  console.log(Boolean("hello world")); //true
  console.log(Boolean(1232)); //true
  console.log(Boolean(['hello', 'world'])); //true
  console.log(Boolean({1:'rahul', 2: 'thakur'})); //true
  console.log(Boolean(null)); //false
  console.log(Boolean(undefined));  //false
  console.log(Boolean(0)); //false
console.log(Boolean(1)); //true