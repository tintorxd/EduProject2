const admin = require("firebase-admin");
admin.initializeApp();

const db = admin.firestore();
const collectionRef = db.collection("usuarios"); // Reemplaza 'usuarios' con el nombre de tu colección real

exports.ejecutarTareaProgramada = functions.https.onRequest((req, res) => {
    // Realiza la acción deseada aquí, como actualizar datos en Firebase.
    // Por ejemplo:
    let contador = 0;
    collectionRef
        .get()
        .then((querySnapshot) => {
            querySnapshot.forEach((doc) => {
                console.log("ID del documento:", doc.id);
                console.log("Datos del documento:", doc.data());
                fecha_inicio = doc.fecha_inicio; // 11/9/2023
                if (!doc.fecha_pago_proximo) {
                    // '' o 11/10/2023
                    fecha_pago_proximo = fecha_inicio + 30; //Poner logica de programacion
                    db.collection("propie").update(
                        { fecha_pago_proximo: fecha_pago_proximo },
                        doc.id
                    ); //actualizar la coleccion del propietario con la fecha del pago proximo
                    return false;
                }
                fecha_pago_proximo = doc.fecha_pago_proximo;
                if (fecha_pago_proximo == Date().now()) {
                    db.collection("notificaciones").create({
                        nombre_propietario: doc.name,
                        placa: doc.placa,
                        deuda: doc.importe_deuda,
                        "fecha de cobro": Date().now(),
                        fecha_ultimo_pago: doc.fecha_ultimo_pago,
                    });
                    fecha_pago_proximo += 30;
                    db.collection("propie").update(
                        { fecha_pago_proximo: fecha_pago_proximo },
                        doc.id
                    ); //actualizar la coleccion del propietario con la fecha del pago proximo
                    contador++;
                    console.log("Notificacion de deuda para: ", doc.name);
                }
            });
        })
        .catch((error) => {
            console.log("Error obteniendo documentos: ", error);
        });

    res.status(200).send("Se han creado " + contador + "Notificaciones");
});
