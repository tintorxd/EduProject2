import * as schedule from "node-schedule";
import * as admin from "firebase-admin";
import { sum } from "lodash";

// Inicializa Firebase Admin SDK con tus credenciales
const serviceAccount = require("../llave.json");
admin.initializeApp({
    credential: admin.credential.cert(serviceAccount),
});

const db = admin.firestore();

export const startSchedule = () => {
    const specificDate = "00 00 * * 1-7";
    schedule.scheduleJob(specificDate, uploadDataToFirestore);
};

const uploadDataToFirestore = () => {
    console.log("Se ejecuta el trigger");
    const ref = db.collection("propie");
    let contador = 0;
    const snapshot = ref.get().then((e) => {
        e.forEach((doc) => {
            console.log("ID del documento:", doc.id);
            console.log("Datos del documento:", doc.data());
            const fecha_pago_proximo = doc.data()["fecha_pago_proximo"];
            console.log(fecha_pago_proximo);
        });
    });
};

const admin = require("firebase-admin");

admin.initializeApp();

const db = admin.firestore();

// Función para ejecutar cada minuto
// eslint-disable-next-line require-jsdoc
function ejecutarCadaMinuto() {
    console.log("Esta función se ejecuta cada minuto.");
    const ref = db.collection("propie");
    // eslint-disable-next-line no-unused-vars
    let contador = 0;

    ref.get()
        .then((querySnapshot) => {
            querySnapshot.forEach((doc) => {
                console.log("ID del documento:", doc.id);
                console.log("Datos del documento:", doc.data());
                // eslint-disable-next-line camelcase
                const fecha_inicio = doc.data()["fecha_inicio"]; // 11/9/2023
                console.log(fecha_inicio);
                const fe = new Date();
                let fe4;
                // console.log(fe);
                // eslint-disable-next-line camelcase
                const fecha_pago_proximo = doc.data()["fecha_pago_proximo"];
                console.log(fecha_pago_proximo);

                if (
                    doc.fecha_pago_proximo === null ||
                    doc.fecha_pago_proximo === ""
                ) {
                    // '' o 11/10/2023
                    // eslint-disable-next-line camelcase
                    // if (fecha_inicio && fecha_inicio._seconds !== undefined) {
                    // eslint-disable-next-line camelcase
                    const fecha = new Date(fecha_inicio._seconds * 1000);
                    const dia = 30;
                    // eslint-disable-next-line camelcase
                    const suma = fecha.setDate(fecha.getDate() + dia);
                    console.log("Resultado Suma: " + suma);
                    // eslint-disable-next-line max-len, camelcase
                    const fecha_pago_proximo = new Date(suma);
                    console.log(
                        "Resultado fecha_pago_proximo: " + fecha_pago_proximo
                    );
                    // eslint-disable-next-line camelcase
                    const fe2 = fecha_pago_proximo.toDateString();
                    console.log("Resultado .toDateString(): " + fe2);
                    db.collection("propie").doc(doc.id).update(
                        // eslint-disable-next-line camelcase
                        { fecha_pago_proximo: fecha_pago_proximo }
                        // eslint-disable-next-line max-len
                    ); // actualizar la coleccion del propietario con la fecha del pago proximo
                    fe4 = fe2;
                    return false;
                    // }
                }
                console.log();
                const fe3 = fe.toDateString();
                fe4 = new Date(
                    fe4._seconds * 1000 + fe4._nanoseconds / 1000000
                );
                // eslint-disable-next-line camelcase
                console.log("fe3: " + fe3);
                console.log("fe4: " + fe4);
                if (fe4 === fe3) {
                    console.log("entro aca");
                    db.collection("notificaciones").doc().set({
                        nombre_propietario: doc.name,
                        placa: doc.placa,
                        deuda: doc.importe_deuda,
                        "fecha de cobro": new Date(),
                        fecha_ultimo_pago: doc.fecha_ultimo_pago,
                    });
                    // eslint-disable-next-line no-const-assign, camelcase
                    fecha_pago_proximo += 30;
                    db.collection("propie").doc(doc.id).update(
                        // eslint-disable-next-line camelcase
                        { fecha_pago_proximo: fecha_pago_proximo }

                        // eslint-disable-next-line max-len
                    ); // actualizar la coleccion del propietario con la fecha del pago proximo
                    contador++;
                    console.log("Notificacion de deuda para: ", doc.name);
                }
            });
        })
        .catch((error) => {
            console.log("Error obteniendo documentos: ", error);
        });

    console.log(ref);
}

// Establecer un temporizador para ejecutar la función cada minuto
const minutos = 1; // Intervalo en minutos
const milisegundosPorMinuto = 60 * 1000; // 1 minuto = 60,000 milisegundos
const intervalo = minutos * milisegundosPorMinuto;

setInterval(ejecutarCadaMinuto, intervalo);
