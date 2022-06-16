// add jquery
var script = document.createElement('script');
script.src = 'https://code.jquery.com/jquery-3.6.0.min.js';
document.getElementsByTagName('head')[0].appendChild(script);



const cards = document.querySelectorAll('.card');

const toggleExpansion = (element, to, duration = 350) => {
    return new Promise((res) => {
    element.animate([
        {
    top: to.top,
    left: to.left,
    width: to.width,
    height: to.height
        }
    ], {duration, fill: 'forwards', ease: 'ease-in'})
    setTimeout(res, duration);
    })
}

const fadeContent = (element, opacity, duration = 300) => {
    return new Promise(res => {
        [...element.children].forEach((child) => {
            requestAnimationFrame(() => {
                child.style.transition = `opacity ${duration}ms linear`;
                child.style.opacity = opacity;
            });
        })
        setTimeout(res, duration);
    })
}

const getCardContent = (title, path) => {
    return `
        <div class="card-content">
            <h2>${title}</h2>
            <img src="image/${path}.jpg" alt="${title}">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque eligendi fuga ullam? Aperiam blanditiis
                cupiditate dicta eius exercitationem explicabo fugit, impedit iure libero nam nihil nisi perferendis
                provident quaerat repellendus vitae voluptate? Aliquid amet architecto asperiores aut consequuntur
                corporis debitis ea eveniet in maiores, nam placeat quae, ratione rerum ullam?abo fugit, impedit iure libero nam nihil nisi perferendis
                provident quaerat repellendus vitae voluptate? Aliquid amet architecto asperiores aut consequuntur
                corporis debitis ea eveniet in maiores, nam placeat quae, ratione rerum ullam?abo fugit, impedit iure libero nam nihil nisi perferendis
                provident quaerat repellendus vitae voluptate? Aliquid amet architecto asperiores aut consequuntur
                corporis debitis ea eveniet in maiores, nam placeat quae, ratione rerum ullam?
            </p>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque eligendi fuga ullam? Aperiam blanditiis
                cupiditate dicta eius exercitationem explicabo fugit, impedit iure libero nam nihil nisi perferendis
                provident quaerat repellendus vitae voluptate? Aliquid amet architecto asperiores aut consequuntur
                corporis debitis ea eveniet in maiores, nam placeat quae, ratione rerum ullam?
            </p>
        </div>
    `;
}

const onCardClick = async (e) => {
    const card = e.currentTarget;
    // clone the card
    const newCard = card.cloneNode(true);
    // get the location of the card in the view
    const {top, left, width, height} = card.getBoundingClientRect();
    // position the clone on top of the original
    newCard.style.position = 'fixed';
    newCard.style.top = top + 'px';
    newCard.style.left = left + 'px';
    newCard.style.width = width + 'px';
    newCard.style.height = height + 'px';
    newCard.style.cursor = 'unset';
    // newCard.style.padding = '10px';
    newCard.style.transform = 'scale(98%)';
    // cardClone.style = 'transform: scale(90%); position:fixed;'
    
    // hide the original card with opacity
    card.style.opacity = '0';
    // add card to the same container
    card.parentNode.appendChild(newCard);
    // create a close button to handle the undo
    const closeButton = document.createElement('button');
    closeButton.classList.add('button_close');
    

    closeButton.addEventListener('click', async () => {
        closeButton.remove();
        newCard.style.removeProperty('display');
        newCard.style.removeProperty('padding');
        [...newCard.children].forEach(child => child.style.removeProperty('display'));
        fadeContent(newCard, '0');
        await toggleExpansion(newCard, {top: `${top}px`, left: `${left}px`, width: `${width}px`, height: `${height}px`}, 400);
        card.style.removeProperty('opacity');
        newCard.remove();
    });


    fadeContent(newCard, '0')
        .then(() => {
            [...newCard.children].forEach(child => child.style.display = 'none');
        });


    await toggleExpansion(newCard, {top: 0, left: 0, width: '100vw', height: '100vh'});
    const content = getCardContent(card.textContent, card.dataset.type)
    newCard.style.display = 'block';
    newCard.style.padding = '0 50px 0 50px';
    newCard.appendChild(closeButton);
    newCard.insertAdjacentHTML('afterbegin', content);
};

cards.forEach(card => card.addEventListener('click', onCardClick));

// window.onload = function() {
//     console.log(document.querySelectorAll('#card'));
//     document.querySelectorAll('.card').forEach((item) => {
//       item.style.opacity = '0';
//       item.style.animation = 'fadeInDown 1s forwards';
//       item.style.animationDelay = 'calc(var(--order)*200ms)';

//     })
    
// }

$(window).scroll(function() {
    if($(window).scrollTop() == $(document).height() - $(window).height()) {
        document.querySelectorAll('main').forEach((item) => {
            console.log('test');
        })
    }
});

function searchBTSList(){
    let input = document.getElementById('search').value;
    input = input.toLowerCase();
    let x = document.getElementsByClassName('card');
      
    for (i = 0; i < x.length; i++) { 
        if (!x[i].querySelector('h2').innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
        }
        else {
            x[i].style.display="flex";              
        }
    }
}