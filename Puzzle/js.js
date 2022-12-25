document.addEventListener('DOMContentLoaded', () => {
    let puzle_game = document.getElementById('puzle-game');
    let result = puzle_game.querySelector('.puzle-result');
    let source = puzle_game.querySelector('.puzle-source');
    const width = 9;
    const height = 6;
    const size = 50;
    const imageURL = 'image.png';
    let arr_pieces = [];
    for (let y = 0; y < height; y++) {
        arr_pieces[y] = [];
        for (let x = 0; x < width; x++){
            let cell = document.createElement('div');
            cell.className = 'puzle-cell';
            cell.x = x;
            cell.y = y;
            cell.style.width = `${size}px`;
            cell.style.height= `${size}px`;
            result.append(cell);

            let piece = document.createElement('div');
            piece.className = 'puzle-item';
            piece.x = x;
            piece.y = y;
            piece.style.backgroundImage = `url(${imageURL})`;
            piece.style.width = `${size}px`;
            piece.style.height= `${size}px`;
            piece.style.backgroundPosition = `${-x * size}px ${-y * size}px`;

            cell.append(piece);
            arr_pieces[y].push(piece);
        }
    }
    let left_site = puzle_game.querySelector('.left-pane');
    let def_w = left_site.offsetWidth;
    let def_h = left_site.offsetHeight;
    for (let i = 0; i < 1000; i++) {
        let rand_x = Math.round(Math.random() * (width - 1));
        let rand_y = Math.round(Math.random() * (height - 1));
        let randpiece = arr_pieces[rand_y][rand_x];

        let posLeft = Math.round(Math.random() * (def_w - size));
        let posTop = Math.round(Math.random() * (def_h - size));

        randpiece.style.position = 'absolute';
        randpiece.style.left = `${posLeft}px`;
        randpiece.style.top = `${posTop}px`;

        source.append(randpiece);
    }

    source.addEventListener('mousedown', e => {
        let target = e.target;
        if (target.classList.contains('puzle-item')) {
            e.preventDefault();
            for (let piece of source.children) {
                piece.style.zIndex = 0;
            }
            target.style.zIndex = 10;
            target.style.pointerEvents = 'none';

            let initX = e.clientX;
            let initY = e.clientY;

            let checkMove = e => {
                let diffX = e.clientX - initX;
                let diffY = e.clientY - initY;
                target.style.top = (target.offsetTop + diffY) + 'px';
                target.style.left = (target.offsetLeft + diffX) + 'px';
                initX = e.clientX;
                initY = e.clientY;
            };

            let checkUp = e => {
                target.style.pointerEvents = 'all';
                document.removeEventListener('mousemove', checkMove);
                document.removeEventListener('mouseup', checkUp);
                result.removeEventListener('mouseup', checkOver);
            };

            document.addEventListener('mousemove', checkMove);
            document.addEventListener('mouseup', checkUp);

            let checkOver = e => {
                let t = e.target;
                if (t.classList.contains('puzle-cell') ) {
                    if (t.x === target.x && t.y === target.y){
                        target.style.position = 'relative';
                        target.style.top = '-1px';
                        target.style.left = '-1px';
                        t.append(target);
                    }
                }
            };
            result.addEventListener('mouseup', checkOver);
        }
    })

});