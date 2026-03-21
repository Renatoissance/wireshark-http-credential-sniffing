# 🔐 Network Traffic Analysis: Credential Sniffing over HTTP

This project demonstrates the critical security risks of unencrypted communication by intercepting login credentials in a controlled local environment using **Wireshark** and **XAMPP**.

---

## 📌 Objective
The goal is to show how sensitive information (usernames/passwords) is transmitted in **plain text** over standard HTTP, making it vulnerable to interception.

## ⚙️ Environment & Tools
* **Packet Analyzer:** Wireshark 4.6.4
* **Local Server:** Apache (via XAMPP)
* **Capture Interface:** Npcap Loopback Adapter (127.0.0.1)
* **Lab Files:** Custom HTML/PHP login form (included in `/src`)

---

## 🧪 Methodology
1.  **Lab Setup:** Deployed a local Apache server using XAMPP to host a non-HTTPS login page.
2.  **Traffic Capture:** Initiated a capture on the **Npcap Loopback Adapter** to intercept local host traffic.
3.  **Simulation:** Performed a login attempt with dummy credentials.
4.  **Analysis:** Filtered traffic using `http.request.method == "POST"` and inspected the payload.

---

## 🔍 Key Findings & Evidence

### 1. User Interface & Interaction
The simulation begins with a standard login form. Note the **"Not Secure"** warning in the browser's address bar.

| Login Interface | Post-Login Response |
| :--- | :--- |
| ![Login Page](./img/login_interface.png) | ![Login Success](./img/login_success.png) |
| *Entering credentials (`admin` / `password1234`)* | *Server confirmation via `login.php`* |

<p align="center"><em>Figure 1: Laboratory UI and workflow.</em></p>

### 2. Identifying the POST Request
By filtering for HTTP POST methods in Wireshark, I isolated the exact moment the login data was transmitted.

![Wireshark Overview](./img/wireshark_overview.png)
<p align="center"><em>Figure 2: Wireshark display filter isolates the login packet.</em></p>

### 3. Credential Extraction (The "Smoking Gun")
Since no encryption (TLS) was used, the password is fully visible in plain text within the HTTP payload.

<p align="center">
  <img src="./img/wireshark_details.png" alt="Credential Extraction" />
</p>
<p align="center"><em>Figure 3: Detailed view showing 'admin' and 'password1234' in the clear.</em></p>

---

## 📁 Resources & Lab Files
* **[Packet Capture](./capture):** Raw network data.
* **[Source Code](./src/):** Unencrypted HTML/PHP files.

---

## 🛡️ Security Implications & Mitigation
* **Encryption:** Use **HTTPS** (TLS) to encrypt data in transit.
* **Integrity:** TLS prevents unauthorized modification of packets.
* **Best Practice:** Never transmit sensitive data over unencrypted channels.

## 📊 Skills Demonstrated
* Network Protocol Analysis (HTTP, TCP/IP)
* Wireshark Proficiency
* Security Vulnerability Identification (CWE-319)

---

⚠️ **Disclaimer:** This project was conducted in a 100% legal, local environment (localhost). It is strictly for educational purposes to demonstrate network security principles.
