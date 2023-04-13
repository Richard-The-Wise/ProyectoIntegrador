function selectSeat(seatId) {
    const seat = document.getElementById(seatId);
    if (!seat.classList.contains('selected')) {
        // asignar valor a enviar a base de datos
        const valueToAssign = seatId;
        console.log(`Asiento seleccionado: ${valueToAssign}`);

        // enviar a base de datos
        // ...
    }
    seat.classList.toggle('selected');
}