'use strict'

let commands = JSON.parse(localStorage.getItem('commands'))
const consoleOutput = document.querySelector('.console-output')

function recordCommands () {
  localStorage.setItem('commands', JSON.stringify(commands))
}

function render() {
  consoleOutput.innerHTML = ''

  for(let command of commands) {
    let consoleLine = document.createElement('div')
    consoleLine.className = 'console-line'

    let info = document.createElement('span')
    info.className = 'console-line-info'
    info.innerHTML = command.info

    let text = document.createElement('p')
    text.className = 'console-line-text'
    text.innerHTML = command.text

    consoleLine.append(info, text)
    consoleOutput.append(consoleLine)
  }
}

function createAnswer(request) {
  try{
    commands.push({
      info: `[${new Date().toLocaleString().slice(0,-3)}] `,
      text: request.responseText
    })
  } catch (e) {
    localStorage.setItem('commands', JSON.stringify([]))
    createAnswer()
  }

  recordCommands()
  render()
}

function connectToCore () {
  document.querySelector('input').addEventListener('keydown', function(e) {
    if (e.keyCode === 13) {
      let total = 'command=' + encodeURIComponent(this.value.toUpperCase())

      if (this.value.toUpperCase() === 'CONSOLE>>CLEAR') {
        commands = []
        localStorage.clear()

        total = 'command=' + encodeURIComponent('The console has been cleared ...')
      }

      this.value = ''

      const request = new XMLHttpRequest();
      request.open("POST", "../core/core.php", true);
      request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      request.addEventListener("readystatechange", () => {
        if(request.readyState === 4 && request.status === 200) createAnswer(request)
      });

      request.send(total);
    }
  });
}

connectToCore()

try {
  render()
}catch (e) {}