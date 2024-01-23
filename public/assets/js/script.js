// import {WORDS} from "./words.js";
let WORDS = [];

$.ajax(
    {
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: "/app/getDictionaryWordsQuran",//getWordsQuranToday
        type: "GET",
        async: false,
        success: function (result) {
            WORDS = result;
        },
    }
);
var todayWord = "";
var currentDate = new Date();
for (let i = 0; i < WORDS.length; i++) {
        var laravelDate = new Date(WORDS[i]['created_at']);
        if (laravelDate.toDateString() === currentDate.toDateString()) {
            todayWord = WORDS[i]['word'];
            break;
        }
}

let arrCharStorage = [];
const body = document.querySelector("body");

document.addEventListener('DOMContentLoaded', function () {
    const NUMBER_OF_GUESSES = 6;
    let guessesRemaining = NUMBER_OF_GUESSES;
    let currentGuess = [];
    let nextLetter = 0;
    // let rightGuessString = WORDS[Math.floor(Math.random() * WORDS.length)]; //get random word from list of words in words.js
    if (todayWord === "") {
        todayWord = WORDS[Math.floor(Math.random() * WORDS.length)]['word']; //get random word from list of words in words.js
    }
    let rightGuessString = todayWord;
    let arrChar = [];

    let WordsArr = [];
    let objSession = {};
    let colors = [];
    var colorCount = 0;
    console.log(rightGuessString);

    function initBoard() {// for creating the board 6 rows of 5 boxes
        let board = document.getElementById("game-board");

        $.ajax(
            {
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "/getCookies",
                type: "POST",
                async: false,
                success: function (result) {
                    objSession = result;
                    // console.log(objSession);
                },
            }
        );
        // console.log(objSession);
        for (let i = 0; i < NUMBER_OF_GUESSES; i++) {
            let row = document.createElement("div");
            row.className = "letter-row";
            for (let j = 0; j < 5; j++) {
                let box = document.createElement("div");

                box.className = "letter-box";

                row.appendChild(box);

            }
            board.appendChild(row);
        }
        if (typeof objSession !== 'undefined') {
            let rows = document.getElementsByClassName("letter-row");
            var charCount = 0;
            var testCount = 0;

            if (objSession.is_played === 'played') {
                // console.log(objSession.date);

                for (let row of rows) {//for adding the words to the board and shading the boxes
                    for (let cell of row.children) {
                        // console.log(objSession.words[charCount]);
                        cell.textContent = objSession.words[charCount];
                        cell.style.backgroundColor = objSession.colors.flat()[charCount];
                        // console.log(objSession.colors.flat());
                        charCount++;
                    }
                }
            }
            // for coloring the keyboard buttons (letters)
            // if (typeof objSession !== 'undefined') {//for shading the keyboard buttons
            if (objSession.is_played === 'played') {
                for (let char of objSession.words) {
                    for (const elem of document.getElementsByClassName("keyboard-button")) {
                        if (elem.textContent === char) {
                            elem.style.backgroundColor = objSession.colors.flat()[colorCount++];
                            elem.style.color = "#fff";
                            testCount++;
                        }
                    }
                }
            }
            // $.ajax(
            //     {
            //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            //         url: "/getSession",
            //         type: "POST",
            //         success: function (result) {
            //             objSession = result;
            //             // console.log(objSession);
            //             // console.log(objSession.words.length);//10
            //
            //             let rows = document.getElementsByClassName("letter-row");
            //             var charCount = 0;
            //             var testCount = 0;
            //
            //             if (objSession.is_played === 'played') {
            //                 // console.log(objSession.date);
            //
            //                 for (let row of rows) {//for adding the words to the board and shading the boxes
            //                     for (let cell of row.children) {
            //                         // console.log(objSession.words[charCount]);
            //                         cell.textContent = objSession.words[charCount];
            //                         cell.style.backgroundColor = objSession.colors.flat()[charCount];
            //                         // console.log(objSession.colors.flat());
            //                         charCount++;
            //                     }
            //                 }
            //             }
            //             // for coloring the keyboard buttons (letters)
            //             // if (typeof objSession !== 'undefined') {//for shading the keyboard buttons
            //             if (objSession.is_played === 'played') {
            //                 for (let char of objSession.words) {
            //                     for (const elem of document.getElementsByClassName("keyboard-button")) {
            //                         if (elem.textContent === char) {
            //                             elem.style.backgroundColor = objSession.colors.flat()[colorCount++];
            //                             elem.style.color = "#fff";
            //                             testCount++;
            //                         }
            //                     }
            //                 }
            //             }
            //         },
            //     }
            // );

        }

    }

    function shadeKeyBoard(letter, color) {// for shading the keyboard buttons

        for (const elem of document.getElementsByClassName("keyboard-button")) {
            if (elem.textContent === letter) {

                let oldColor = elem.style.backgroundColor;
                if (oldColor === "#538D4E") {
                    return;
                }

                if (oldColor === "#B59F3B" && color !== "#538D4E") {
                    return;
                }

                elem.style.backgroundColor = color;
                elem.style.color = "#fff";
                break;
            }
        }
    }

    function deleteLetter() {
        let row = document.getElementsByClassName("letter-row")[6 - guessesRemaining];
        let box = row.children[nextLetter - 1];
        box.textContent = "";
        box.classList.remove("filled-box");
        currentGuess.pop();
        arrChar.pop();
        nextLetter -= 1;
    }


    function checkGuess() {
        let row = document.getElementsByClassName("letter-row")[6 - guessesRemaining];
        let guessString = "";
        let rightGuess = Array.from(rightGuessString);

        for (const val of currentGuess) {
            guessString += val;
        }

        if (guessString.length != 5) {
            // toastr.options.positionClass = 'toast-top-center';
            toastr.error("يجب ملئ الفراغات بالكامل!");
            return;
        }

        //here
        let arrWord = [];
        for (var i = 0; i < WORDS.length; i++) {
            arrWord.push(WORDS[i].word);
        }
        // console.log(arrWord);
        // console.log(guessString);
        // var hardMood = $('.hard-mode-switch').data('value');
        // if (hardMood === 'hard') {
        //     if (!arrWord.includes(guessString)) {
        //         toastr.error("الكلمة غير xxxx!");
        //         return;
        //     }
        // }
        // var check = 0;
        // $.ajax(
        //     {
        //         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        //         url: "/app/checkWordsQuranToday",
        //         type: "POST",
        //         data: {
        //             word: guessString,
        //         },
        //         success: function (result) {
        //             check = result.status;
        //             // console.log(result);
        //             // if (result.status === 0) {
        //             //     toastr.error("الكلمة غير موجودة!");
        //             //     return;
        //             // }
        //         },
        //     }
        // );
        if (!arrWord.includes(guessString)) {
            toastr.error("الكلمة غير موجودة!");
            return;
        }

        // if (!WORDS.includes(guessString)) {
        //     toastr.error("الكلمة غير موجودة!");
        //     return;
        // }

        // var letterColor = ["#3A3A3C", "#3A3A3C", "#3A3A3C", "#3A3A3C", "#3A3A3C"];
        var letterColor = ["#FF0000", "#FF0000", "#FF0000", "#FF0000", "#FF0000"];//787C7E FF0000

        //check green
        for (let i = 0; i < 5; i++) {
            if (rightGuess[i] == currentGuess[i]) {
                letterColor[i] = "#538D4E";
                rightGuess[i] = "#";
            }
        }

        //check yellow
        //checking guess letters
        for (let i = 0; i < 5; i++) {
            if (letterColor[i] == "#538D4E") continue;


            //checking right letters
            for (let j = 0; j < 5; j++) {
                if (rightGuess[j] == currentGuess[i]) {
                    // letterColor[i] = "#B59F3B";
                    letterColor[i] = "#C9B458";
                    rightGuess[j] = "#";
                    // arrChar.push(guessString)
                }

            }
        }


        for (let i = 0; i < 5; i++) {
            let box = row.children[i];
            let delay = 250 * i;
            setTimeout(() => {
                //flip box
                animateCSS(box, "flipInX");
                //shade box
                box.style.backgroundColor = letterColor[i];
                // colors.push(letterColor[i]);
                // arrChar.push(letterColor[i]);
                // console.log(letterColor[i]);
                shadeKeyBoard(guessString.charAt(i) + "", letterColor[i]);
            }, delay);
        }
        colors.push(letterColor);

        if (guessString === rightGuessString) {
            toastr.success("!لقد ربحت");
            guessesRemaining = 0;

            $.ajax(
                {
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "/session",
                    type: "POST",
                    data: {
                        words: arrChar,
                        colors: colors,
                        is_win:'won'
                    },
                    success: function (result) {
                        console.log(result)

                        if (result.date === 'today') {
                            const myTimeout = setTimeout(openModal, 3000);
                            objSession = result;
                            function openModal() {
                                // $('#status-modal').css('display', 'block');
                                // location.reload();
                                // $("#ModalStatistic").load(location.href + " #ModalStatistic");
                                $('.modalStatisticButton').trigger('click');

                            }
                        }
                    },
                }
            );
            $('.letter-box').css('color', 'white');
            return;
        } else {
            guessesRemaining -= 1;
            currentGuess = [];
            nextLetter = 0;

            if (guessesRemaining === 0) {
                toastr.error("لقد نفدت التخمينات! انتهت اللعبة!");
                toastr.info(`الكلمة الصحيحة هي ${rightGuessString}`);
                $.ajax(
                    {
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "/session",
                        type: "POST",
                        data:
                            {
                                words: arrChar,
                                colors: colors
                            },
                        success: function (result) {
                            // console.log(typeof result);
                            console.log(result);

                            if (result.date === 'today') {
                                const myTimeout = setTimeout(openModal, 3000);
                                // WordsArr.push(result.words);
                                objSession = result;

                                // console.log(result + " sss ");
                                function openModal() {
                                    // $('#status-modal').css('display', 'block');
                                    $('.modalStatisticButton').trigger('click');
                                }
                            }
                        },
                    }
                );
            }
            $('.letter-box').css('color', 'white');
        }

    }

    function insertLetter(pressedKey) {
        if (nextLetter === 5) {
            return;
        }
        pressedKey = pressedKey.toLowerCase();

        let row = document.getElementsByClassName("letter-row")[6 - guessesRemaining];
        let box = row.children[nextLetter];
        animateCSS(box, "pulse");
        box.textContent = pressedKey;
        box.classList.add("filled-box");
        currentGuess.push(pressedKey);
        arrChar.push(pressedKey);
        if(body.classList.contains("dark")){
            box.style.color = "#ffffff";
        }else{
            box.style.color = "#000000";
        }
        nextLetter += 1;
    }

    const animateCSS = (element, animation, prefix = "animate__") =>
        // We create a Promise and return it
        new Promise((resolve, reject) => {
            const animationName = `${prefix}${animation}`;
            // const node = document.querySelector(element);
            const node = element;
            node.style.setProperty("--animate-duration", "0.3s");

            node.classList.add(`${prefix}animated`, animationName);

            // When the animation ends, we clean the classes and resolve the Promise
            function handleAnimationEnd(event) {
                event.stopPropagation();
                node.classList.remove(`${prefix}animated`, animationName);
                resolve("Animation ended");
            }

            node.addEventListener("animationend", handleAnimationEnd, {once: true});
        });

    document.addEventListener("keyup", (e) => {
        if (guessesRemaining === 0) {
            return;
        }

        let pressedKey = String(e.key);
        if (pressedKey === "Backspace" && nextLetter !== 0) {
            deleteLetter();
            return;
        }

        if (pressedKey === "Enter") {
            if (objSession.is_played !== 'played') {
                checkGuess();
            }
            // checkGuess();
            return;
        }

        if (objSession.is_played === 'played') {//for preventing the user from typing
            return ;
        }

        // if (typeof objSession !== 'undefined') {//for preventing the user from typing
        //     if (objSession.words) {
        //         return;
        //     }
        // }

        // let found = pressedKey.match(/[a-z]/gi); //change here for arabic
        let found = pressedKey.match(/[\u0600-\u06FF]/); //change here for arabic
        if (!found || found.length > 1) {
            return;
        } else {
            insertLetter(pressedKey);
        }
    });

    document.getElementById("keyboard-cont").addEventListener("click", (e) => {
        const target = e.target;

        if (!target.classList.contains("keyboard-button")) {
            return;
        }
        let key = target.textContent;

        if (key === "Del") {
            key = "Backspace";
        }

        document.dispatchEvent(new KeyboardEvent("keyup", {key: key}));
    });

    initBoard();
});