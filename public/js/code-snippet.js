document.addEventListener("DOMContentLoaded", function () 
{
    const stars = document.querySelectorAll(".codeBox_star");
    stars.forEach(star => {
        star.addEventListener('click', function () {
            updateStars(star.id);
        });
    });
});

function updateStars(id) {
    fetch(`/content/code-snippet/${id}`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({})
    }).then(res => {
        if (!res.ok) {
            throw new Error(`Ошибка HTTP: ${res.status}`);
        }
        return res.json(); 
    })
    .then(data => {
        const star = document.querySelector(`#countStar_${id}`).textContent = `${data.stars} stars`;
        console.log(star);
    });
}