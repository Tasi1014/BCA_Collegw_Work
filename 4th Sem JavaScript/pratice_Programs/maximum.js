let arr = [2,5,7,1,3,63,5,1,222,55,212];

let max = (inputArr)=>{
    let max = inputArr[0];

    for(i = 0; i<inputArr.length; i++){
        if(max<inputArr[i]){
            max = inputArr[i];
        }
    }

    return max;
}


let maxELement = max(arr);

console.log(`The maximum element in the array is ${maxELement}`);
