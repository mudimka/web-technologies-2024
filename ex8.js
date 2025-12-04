// Задание 1

function pickPropArray(arr, prop) {
    return arr.map(obj => obj[prop])
        .filter(Boolean);
}

const students = [
   { name: 'Павел', age: 20 },
   { name: 'Иван', age: 20 },
   { name: 'Эдем', age: 20 },
   { name: 'Денис', age: 20 },
   { name: 'Виктория', age: 20 },
   { age: 40 },
]
const result = pickPropArray(students, 'name')

console.log(result) 


// Задание 2

function createCounter() {
  let count = 0;

  return function () {
    count += 1;
    console.log(count)    
  }
}

const counter1 = createCounter()
counter1() // 1
counter1() // 2

const counter2 = createCounter()
counter2() // 1
counter2() // 2


// Задание 3

function spinWords(string){
    let res = [];
    const words = string.split(' ');
    for (let word of words){
        if (word.length >= 5){
            word = word.split('').reverse().join('');
        }
        res.push(word);
    }
    return console.log(res);
}


const result1 = spinWords( "Привет от Legacy" )
console.log(result1) // тевирП от ycageL

const result2 = spinWords( "This is a test" )
console.log(result2) // This is a test


// Задание 4

function indexSum(nums, target){
    const hash = {};
        
        for (let i = 0; i < nums.length; i++) {
            const complement = target - nums[i];
            
            if (hash[complement] !== undefined) {
                return [hash[complement], i];
            }
            
            hash[nums[i]] = i;
        }
        
        return [];
}

console.log(indexSum([2,7,11,15], 9))


// Вывод: [0,1]
// Объяснение: Поскольку nums[0] + nums[1] == 9, мы возвращаем [0, 1].


// Задание 5

function longestCommonPrefix(strs) {
    if (strs.length < 2) return "";
    
    const firstStr = strs[0];
    let result = "";
    
    for (let i = 0; i < firstStr.length; i++) {
        for (let j = i + 2; j <= firstStr.length; j++) {
            const substring = firstStr.substring(i, j);

            let isCommon = true;
            for (let k = 1; k < strs.length; k++) {
                if (!strs[k].includes(substring)) {
                    isCommon = false;
                    break;
                }
            }
            
            if (isCommon && substring.length > result.length) {
                result = substring;
            }
        }
    }
    
    return result;
}


const strs1 = ["цветок","поток","хлопок"];
console.log(longestCommonPrefix(strs1)); // "ок"

const strs2 = ["собака","гоночная машина","машина"];
console.log(longestCommonPrefix(strs2)); // ""
