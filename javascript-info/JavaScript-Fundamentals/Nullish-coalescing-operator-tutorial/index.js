/**
 * Nullish coalescing operator '??'
 */
a = 10;
a = a ?? "nothing";
console.log(a);
b = null;
b = b ?? "nothing";
console.log(b);
c = undefined;
c = c ?? "nothing";
console.log(c);
d = "";
d = d ?? "nothing";
console.log(d);
e = " ";
e = e ?? "nothing";
console.log(e);