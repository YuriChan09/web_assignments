document.getElementById('solve').addEventListener('click', () => {
    const a = parseFloat(document.getElementById('a').value);
    const b = parseFloat(document.getElementById('b').value);
    const c = parseFloat(document.getElementById('c').value);
    const resultElement = document.getElementById('result');

    if (isNaN(a) || isNaN(b) || isNaN(c)) {
        resultElement.innerHTML = '请输入有效的系数';
        return;
    }

    const delta = b * b - 4 * a * c;

    if (delta < 0) {
        resultElement.innerHTML = '此方程没有实数解';
    } else if (delta === 0) {
        const x = -b / (2 * a);
        resultElement.innerHTML = `方程有一个实数解: x = ${x.toFixed(2)}`;
    } else {
        const x1 = (-b + Math.sqrt(delta)) / (2 * a);
        const x2 = (-b - Math.sqrt(delta)) / (2 * a);
        resultElement.innerHTML = `方程有两个实数解: x1 = ${x1.toFixed(2)}, x2 = ${x2.toFixed(2)}`;
    }
});
