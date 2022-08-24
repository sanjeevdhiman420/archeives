/**
 * local varibale and outer variable use case and limitations
 */
 let work = 'work'; //Global scope
 function funtionTesting  (str, num) {
     
 str = str? str : 'nothing here';
     num = num? num : 'no digit here';
     console.log(str); //Local scope variable
     console.log(num); //Local scope variable
     console.log(work); //Global scope variable
 }
 funtionTesting('DFJ',43);
 /**
  * Result 
  * DFJ
  * 43
  *work
  */    