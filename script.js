function handleChange() {
    let chosenOption = document.getElementById('selector').value;
    console.log(chosenOption);
    if (chosenOption == 'series') {
        document.querySelectorAll('.films').forEach((el) => {
            el.style.display= 'none';
        });

        document.querySelectorAll('.series').forEach((el) => {
            el.style.display= 'table-row';
        });
    }else if (chosenOption == 'films') {
        document.querySelectorAll('.series').forEach((el) => {
            el.style.display= 'none';
        });

        document.querySelectorAll('.films').forEach((el) => {
            el.style.display= 'table-row';
        });
    } else {
        document.querySelectorAll('.series').forEach((el) => {
            el.style.display= 'table-row';
        });

        document.querySelectorAll('.films').forEach((el) => {
            el.style.display= 'table-row';
        });
    }
}