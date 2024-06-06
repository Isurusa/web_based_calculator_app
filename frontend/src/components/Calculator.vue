<template>
  <div>
    <div class="calculator">
      <div class="display">
        <input type="text" v-model="currentInput" readonly />
      </div>
      <div class="buttons">
        <button class="function-btn" @click="clearInput">AC</button>
        <button class="function-btn" @click="toggleSign">+/-</button>
        <button class="function-btn" @click="calculatePercentage">%</button>
        <button class="operator-btn" @click="appendToInput('/')">÷</button>
        <button class="number-btn" @click="appendToInput('7')">7</button>
        <button class="number-btn" @click="appendToInput('8')">8</button>
        <button class="number-btn" @click="appendToInput('9')">9</button>
        <button class="operator-btn" @click="appendToInput('*')">×</button>
        <button class="number-btn" @click="appendToInput('4')">4</button>
        <button class="number-btn" @click="appendToInput('5')">5</button>
        <button class="number-btn" @click="appendToInput('6')">6</button>
        <button class="operator-btn" @click="appendToInput('-')">-</button>
        <button class="number-btn" @click="appendToInput('1')">1</button>
        <button class="number-btn" @click="appendToInput('2')">2</button>
        <button class="number-btn" @click="appendToInput('3')">3</button>
        <button class="operator-btn" @click="appendToInput('+')">+</button>
        <button class="number-btn zero-btn" @click="appendToInput('0')">0</button>
        <button class="number-btn" @click="appendToInput('.')">.</button>
        <button class="operator-btn" @click="calculateResult">=</button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "CalculatorApp",
  data() {
    return {
      currentInput: "",
      calculation_method: "",
      calculation_result: "",
    };
  },
  methods: {
    appendToInput(value) {
      this.currentInput += value;
    },
    clearInput() {
      this.currentInput = "";
    },
    toggleSign() {
      if (this.currentInput.startsWith("-")) {
        this.currentInput = this.currentInput.substring(1);
      } else if (this.currentInput) {
        this.currentInput = "-" + this.currentInput;
      }
    },
    calculatePercentage() {
      if (this.currentInput) {

        this.calculation_method = this.currentInput + "%";
        this.currentInput = (parseFloat(this.currentInput) / 100).toString();

        this.calculation_result = this.currentInput;
        this.sendToStore();
      }
    },
    calculateResult() {
      try {
        this.calculation_method = this.currentInput;
        this.currentInput = eval(this.calculation_method).toString();
        
        this.calculation_result = this.currentInput;
        this.sendToStore();
      } catch (e) {
        this.currentInput = "Error";
      }
    },
    async sendToStore() {
      let formData = new FormData();
      formData.append("calculation_method", this.calculation_method);
      formData.append("calculation_result", this.calculation_result);
      
      let url = "http://127.0.0.1:8000/api/calculation_store";

      await axios
        .post(url, formData)
        .then((response) => {
          if (response.status == 200) {
            console.log(response.data.message);
          } else {
            console.log("Error");
          }
        })
        .catch((error) => {
          this.errors.push(error.response);
        });
    },
  },
};
</script>

<style scoped>
.calculator {
  width: 90%;
  max-width: 320px;
  margin: 50px auto;
  padding: 10px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  background: #000;
}
.display {
  margin-bottom: 10px;
}
.display input {
  width: 100%;
  height: 100px;
  margin-top: 40px;
  font-size: 85px;
  font-weight: lighter;
  text-align: right;
  /* padding-right: 10px; */
  box-sizing: border-box;
  background: #000;
  color: #fff;
  border: none;
  pointer-events: none;
}
.buttons {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

button {
  width: 22%;
  margin: 1.5%;
  height: 70px;
  font-size: 30px;
  border: 1px solid #222;
  background: #333;
  color: #fff;
  outline: none;
  cursor: pointer;
  border-radius: 50%;
  display: flex;
  align-items: center;
  box-sizing: border-box;
}
button.function-btn {
  background: #999999;
  color: #000;
  justify-content: center;
}
button.operator-btn {
  background: #ff9500;
  color: #fff;
  justify-content: center;
}
button.number-btn {
  background: #333333;
  color: #fff;
  justify-content: center;
}
button.zero-btn {
  width: 46%;
  border-radius: 50px;
  padding-left: 9%;
  justify-content:left;
}

button:active {
  opacity: 0.7;
}

@media (max-width: 400px) {
  button {
    height: 70px;
    font-size: 24px;
  }
  .display input {
    height: 85px;
    margin-top: 40px;
    font-size: 70px;
  }
}

@media (max-width: 300px) {
  button {
    height: 50px;
    font-size: 18px;
  }
  .display input {
    height: 65px;
    margin-top: 30px;
    font-size: 50px;
  }
}
</style>