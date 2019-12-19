var camera, scene, renderer;
var geometry, material, mesh;

var three = THREE;

init();
animate();


function init() {

    camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 1, 10000);
    camera.position.z = 1000;

    scene = new THREE.Scene();

    var cubeMaterials = [
        new THREE.MeshBasicMaterial({
            map: image1
        }),
        new THREE.MeshBasicMaterial({
            map: image2
        }),
        new THREE.MeshBasicMaterial({
            map: image3
        }),
        new THREE.MeshBasicMaterial({
            map: image4
        }),
        new THREE.MeshBasicMaterial({
            map: image5
        }),
        new THREE.MeshBasicMaterial({
            map: image6
        }),
    ];

    geometry = new THREE.BoxGeometry(500, 500, 500);
    mesh = new THREE.Mesh(geometry, cubeMaterials);
    scene.add(mesh);

    renderer = new THREE.WebGLRenderer();
	var container = document.getElementById('3Dmodel');
    renderer.setSize(window.innerWidth, window.innerHeight);
         
    container.appendChild(renderer.domElement);

}

function animate() {

    requestAnimationFrame(animate);

     mesh.rotation.x += 0.003;
     mesh.rotation.y += 0.003;
     mesh.rotation.z += 0.003;

    renderer.render(scene, camera);

}

/* */
var isDragging = false;
var previousMousePosition = {
    x: 0,
    y: 0
};
$(renderer.domElement).on('mousedown', function(e) {
        isDragging = true;
    })
    .on('mousemove', function(e) {
        //console.log(e);
        var deltaMove = {
            x: e.offsetX - previousMousePosition.x,
            y: e.offsetY - previousMousePosition.y
        };

        if (isDragging) {

            var deltaRotationQuaternion = new three.Quaternion()
                .setFromEuler(new three.Euler(
                    toRadians(deltaMove.y * 1),
                    toRadians(deltaMove.x * 1),
                    0,
                    'XYZ'
                ));

            mesh.quaternion.multiplyQuaternions(deltaRotationQuaternion, mesh.quaternion);
        }

        previousMousePosition = {
            x: e.offsetX,
            y: e.offsetY
        };
    });

$(document).on('mouseup', function(e) {
    isDragging = false;
});




window.requestAnimFrame = (function() {
    return window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        function(callback) {
            window.setTimeout(callback, 1000 / 60);
        };
})();

var lastFrameTime = new Date().getTime() / 1000;
var totalGameTime = 0;

function update(dt, t) {

    setTimeout(function() {
        var currTime = new Date().getTime() / 1000;
        var dt = currTime - (lastFrameTime || currTime);
        totalGameTime += dt;

        update(dt, totalGameTime);

        lastFrameTime = currTime;
    }, 0);
}

function toRadians(angle) {
    return angle * (Math.PI / 180);
}

function toDegrees(angle) {
    return angle * (180 / Math.PI);
}



update(0, totalGameTime);