window.onload = function() {
    let selectCountry = document.getElementById('country');
    console.log(selectCountry);
      
    function cargarCountry() {
      fetch('https://apis.datos.gob.ar/georef/api/provincias?campos=id,nombre')
      .then(function(responseAPI) {
        return responseAPI.json();
      })
      .then(function(dataAPI) {
        console.log(dataAPI);
        selectCountry.innerHTML = `
          <option value="" disabled selected>Seleccione un País...</option>
        `;
        for(let country of respuestaCountry.provincias) {
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
  
    
  
    cargarCountry();
    selectCountry.addEventListener('change', function() {
      let countryElegido = selectCountry.value;

    })
  
  }