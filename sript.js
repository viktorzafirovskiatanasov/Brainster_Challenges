function checkEven(number) {
    if (number % 2 === 0) {
      console.log(`The Number ${number} is even`);
    } else {
      console.log(`The Number ${number} is not even`);
    }
  }
  
 
  checkEven(6);
  checkEven(7);
  

  for (let number = 10; number <= 100; number++) {
    if (number % 2 === 0 && number % 3 === 0) {
      console.log(`${number} is even and divisible by 3`);
    }
  }

  
  function isPrime(num) {
    if (num <= 1) return false;
    if (num <= 3) return true;
  
    if (num % 2 === 0 || num % 3 === 0) return false;
  
    for (let i = 5; i * i <= num; i += 6) {
      if (num % i === 0 || num % (i + 2) === 0) return false;
    }
  
    return true;
  }
  
  function findSmallestLargestAndCheckPrime(number1, number2, number3) {
    const numbers = [number1, number2, number3];
    const smallest = Math.min(...numbers);
    const largest = Math.max(...numbers);
  
    console.log(`Smallest - ${smallest}, Largest - ${largest}`);
  
    if (isPrime(smallest)) {
      console.log(`The smallest number ${smallest} is prime.`);
    } else {
      console.log(`The smallest number ${smallest} is not prime.`);
    }
  
    if (isPrime(largest)) {
      console.log(`The largest number ${largest} is prime.`);
    } else {
      console.log(`The largest number ${largest} is not prime.`);
    }
  }
  

  findSmallestLargestAndCheckPrime(47, 97, 97);
  