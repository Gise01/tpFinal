window.onload = function() {
    let selectCountry = document.getElementById('country');
    console.log(selectCountry);
      
    function cargarCountry() {
      fetch(getJSON('https://restcountries.eu/rest/v2/all'))
      .then(function(responseAPI) {
        return responseAPI.json();
      })
      .then(function(dataAPI) {
        console.log(dataAPI);
        selectCountry.innerHTML = `
          <option value="" disabled selected>Seleccione un País...</option>
        `;
        for(let country of respuestaCountry) {
          let optionCountry = document.createElement('option');
          optionCountry.setAttribute('value', country.name);
          optionCountry.innerHTML = country.name;
          selectCountry.append(optionCountry);
        }
      })
      .catch(function(error){
          console.log(error);
          
      })
    }
  
    
  
    cargarProvincias();
    selectCountry.addEventListener('change', function() {
      let countryElegido = selectCountry.value;

    })
  
  }