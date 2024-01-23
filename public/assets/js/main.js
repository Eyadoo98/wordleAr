// const moon = document.querySelector("#moon");
// const body = document.querySelector("body");
// const toggleMood = document.querySelector("#toggleMood");
//
// // Retrieve the stored toggle state from sessionStorage
// const storedToggleState = sessionStorage.getItem("toggleClass");
// if (storedToggleState === "true") {
//     body.classList.add("dark");
// }
//
// moon.addEventListener("click", () => {
//     var toggle = body.classList.toggle("dark");
//
//     // Save the updated toggle state in sessionStorage
//     sessionStorage.setItem("toggleClass", toggle);
//     let box = document.createElement("div");
//
//     box.className = "letter-box";
//
//     if (body.classList.contains("dark")) {
//         box.style.color = "#ffffff";
//     } else {
//         box.style.color = "#000000";
//     }
// });
//
// toggleMood.addEventListener("click", () => {
//     alert("toggle");
//     var toggleBody = body.classList.toggle("dark");
//
//     // Save the updated toggle state in sessionStorage
//     sessionStorage.setItem("toggleClass", toggleBody);
// });

function shareResults() {
// 🟩🟩⬛⬛🟨 ⬛⬛⬛⬛⬛ ⬛⬛⬛🟨⬛ 🟩🟩🟩🟩🟩

    let wordColors = "";
    let words = "";
    $.ajax(
        {
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "/getCookies",
            type: "POST",
            async: false,
            success: function (result) {
                // wordColors.push((result.colors));
                wordColors += result.colors;
                words+= result.words;
            },
        }
    );
    const wordSplit = words.split(',');

    let emojiColors = "";
    const colorCodes = wordColors.split(',');
    var dummyTextarea = document.createElement('textarea');

    for (let i = 0; i < colorCodes.length; i++) {
        const color = colorCodes[i];
        if (color === '#538D4E') {
            emojiColors+= '🟩 ';
        }
        if (color === '#C9B458') {
            emojiColors+= '🟨 ';
        }
        if (color === '#FF0000') {//787C7E
            // emojiColors+= '⬛ ';
            emojiColors+= '🟥 ';
        }
        if(colorCodes.length === i + 1 ){
            emojiColors+= ' wordle ' + wordSplit.length/5 + '/6';
        }
        // Create a dummy textarea
        dummyTextarea.value = emojiColors;

        // Append the textarea to the document
        document.body.appendChild(dummyTextarea);

        navigator.clipboard.writeText(emojiColors.value);
        // Use the asynchronous Clipboard API

        navigator.clipboard.writeText(emojiColors).then(function () {
            if(colorCodes.length === i + 1 ){
                toastr.options = {
                    closeButton: true,
                    positionClass: 'toast-top-center', // Set position to top-center
                    timeOut: 3000 // Set the duration for which the toast will be shown (in milliseconds)
                };
                toastr.success("تم نسخ النتيجة إلى الحافظة");
            }
        }).catch(function (err) {
            // Handle errors
            console.error('Unable to copy emoji to clipboard', err);
        }).finally(function () {
            // Remove the dummy textarea
            document.body.removeChild(dummyTextarea);
        });
    }
}