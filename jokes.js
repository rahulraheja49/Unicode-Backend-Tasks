// Programming jokes
function getProg() {
    axios
        .get("https://sv443.net/jokeapi/v2/joke/Programming?amount=10", {
          timeout: 5000
        })
        .then(res => showJokes(res))
        .catch(err => console.error(err));
}

// Miscallaneous jokes
function getMisc() {
    axios
        .get("https://sv443.net/jokeapi/v2/joke/Miscallaneous?amount=10")
        .then(res => showJokes(res))
        .catch(err => console.error(err));
}

// Dark jokes
function getDark() {
    axios
        .get("https://sv443.net/jokeapi/v2/joke/Dark?amount=10")
        .then(res => showJokes(res))
        .catch(err => console.error(err));
}

// Puns
function getPun() {
    axios
        .get("https://sv443.net/jokeapi/v2/joke/Pun?amount=10")
        .then(res => showJokes(res))
        .catch(err => console.error(err));
}


// Show Jokes
function showJokes(result) {
  console.log(result);
  document.getElementById('result').innerHTML = `<h5>${JSON.stringify(result.data.jokes[0].category)}</h5>`;
    for(i=0; i<10; i++){
      if(result.data.jokes[i].type == "single"){
        document.getElementById('result').innerHTML += `
          <pre>
          ${i+1}) Joke: ${JSON.stringify(result.data.jokes[i].joke)}
          </pre>`;
      } else if (result.data.jokes[i].type == "twopart") {
        document.getElementById('result').innerHTML += `
          <pre>
          ${i+1}) Setup: ${JSON.stringify(result.data.jokes[i].setup)}
             Delivery: ${JSON.stringify(result.data.jokes[i].delivery)}
          </pre>`;
      }
    }
}


// Event Listners
document.getElementById('programming').addEventListener('click', getProg);
document.getElementById('misc').addEventListener('click', getMisc);
document.getElementById('dark').addEventListener('click', getDark);
document.getElementById('pun').addEventListener('click', getPun);