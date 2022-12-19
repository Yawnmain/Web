w = prompt('Введите ширину поля: ');
h = prompt('Введите высоту поля: ');
m = prompt('Введите кол-во мин: ');
minesweeper(w, h, m);
function minesweeper(width, height, minesCount) {

    // создание поля
    const cont = document.querySelector('.container');
    const size = width * height;
    let done_cells = size;
    cont.innerHTML = '<button class="cell" id="btn"></button>'.repeat(size);
    const cells = [...cont.children];

    // Спавн мин
    const mines = [...Array(size).keys()]
        .sort(() => Math.random() - 0.5) // перемешивание
        .slice(0, minesCount);

    cont.addEventListener('click', (event) => {
        if (event.target.tagName !== 'BUTTON') {
            return;
        }


        const cell_pos = cells.indexOf(event.target);
        const c = cell_pos % width;
        const r = Math.floor(cell_pos / width);
        
        OpenCell(r, c);
        event.target.style.backgroundColor = 'white';
        cell.style.color = 'red';

    });

    cont.addEventListener('contextmenu', function(event){
        event.preventDefault()
        let cell_pos = cells.indexOf(event.target)
        cells[cell_pos].innerHTML = '🚩';

    });

    function size_check(r, c) {
        return r >= 0
            && r < height
            && c >= 0
            && c < width;
     }

     // перебор соседних ячеек для спавна чисел
     function NumsSpawn(r, c){
        let num = 0
        for (let i = -1; i <= 1; i++) {
            for (let j = -1; j <= 1; j++) {
                if (check_for_mine(r + j, c + i)) {
                    num += 1;
                }
            }
        }
        return num;
    }
    // Открытие ячейки
    function OpenCell(r, c) {
        if (!size_check(r, c)){
            return;
        }
        const cell_pos = r * width + c;
        const cell = cells[cell_pos];

        if (cell.disabled === true) {
            return;
        }

        cell.disabled = true;
        
        

        if (check_for_mine(r, c)) {
            cell.innerHTML = '💣';
            alert('BOOOM!');
            location.reload();
            return;
        }
        done_cells -= 1;
        if (done_cells <= minesCount) {
            alert('Победа!');
            return;
        }

        const num = NumsSpawn(r, c);

        if (num !== 0) {
            cell.innerHTML = num;
            cell.style.backgroundColor = 'white';
            cell.style.color = 'red';
            return;
        }
        else{
        for (let i = -1; i <= 1; i++) {
            for (let j = -1; j <= 1; j++) {
                OpenCell(r + j, c + i);
                cell.style.backgroundColor = 'white';
            }
        }
    }
    }

    function check_for_mine(r,c) {
        if (!size_check(r, c )) {
            return false;
        }

        const cell_pos = r * width + c;
        return mines.includes(cell_pos);
    }


}

