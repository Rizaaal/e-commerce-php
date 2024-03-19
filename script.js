
addEventListener('load', () => {
  fetch('https://mockend.up.railway.app/api/products')
  .then(res => res.json())
  .then(json => {
    json.forEach(item => {
      const card = document.createElement('div');
      const title = document.createElement('h2');
      const thumb = document.createElement('img');
      const price = document.createElement('p');

      card.className = 'card';

      title.innerText = item.title;
      thumb.src = item.thumbnail;
      price.innerText = item.price + '€';

      card.appendChild(title);
      card.appendChild(thumb);
      card.appendChild(price);

      document.body.children[1].appendChild(card);
    })
  });
});