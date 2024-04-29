# Empleados Service
# Import Framework
from flask import Flask, jsonify
from flask_restful import Resource, Api

# Define the Node class
class Node:
    def __init__(self, empleado):
        self.empleado = empleado
        self.siguiente = None

# Define the Empleado class
class Empleado:
    def __init__(self, nombre, apellido, edad, puesto):
        self.nombre = nombre
        self.apellido = apellido
        self.edad = edad
        self.puesto = puesto

empleado1 = Empleado("Juan", "Perez", 30, "Gerente")
empleado2 = Empleado("Maria", "Gomez", 25, "Analista")
empleado3 = Empleado("Pedro", "Lopez", 35, "Desarrollador")
empleado4 = Empleado("Laura", "Diaz", 28, "Diseñador")
empleado5 = Empleado("Ana", "Martinez", 32, "Contador")

nodo1 = Node(empleado1)
nodo2 = Node(empleado2)
nodo3 = Node(empleado3)
nodo4 = Node(empleado4)
nodo5 = Node(empleado5)

nodo1.siguiente = nodo2
nodo2.siguiente = nodo3
nodo3.siguiente = nodo4
nodo4.siguiente = nodo5


app = Flask(__name__)
api = Api(app)

class Empleados(Resource):
    def get(self):
        current = nodo1
        nodes = []
        while current:
            nodes.append({
                "nombre": current.empleado.nombre,
                "apellido": current.empleado.apellido,
                "edad": current.empleado.edad,
                "puesto": current.empleado.puesto
            })
            current = current.siguiente
        return {"lista_enlazada": nodes}

# Create routes
api.add_resource(Empleados, '/')

# Run the Application
if __name__ == '__main__':
    app.run(host='0.0.0.0', port=80, debug=True)
