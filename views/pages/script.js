// import * as THREE from 'three'

// Canvas
const canvas = document.querySelector('canvas.webgl')

// Scene
const scene = new THREE.Scene()

/**
Textures
 */

const textureLoader = new THREE.TextureLoader()
const texture = textureLoader.load('texture.png')
const disMap = textureLoader.load('displacement-map.png')
const alphaMap = textureLoader.load('alpha-map.png')

/**
 * Objects
 */

const planeGeometry = new THREE.PlaneBufferGeometry(5, 5, 64, 64)
const planeMaterial = new THREE.MeshStandardMaterial({
    color : 0xffffff,
    map : texture,
    displacementMap : disMap,
    alphaMap : alphaMap,
    transparent : true,
    wireframe : true
})

const plane = new THREE.Mesh(planeGeometry, planeMaterial)
console.log(plane)
plane.rotation.x =  - Math.PI/2.5

scene.add(plane)

/**
 LIGHTS
 */

 const pointLight = new THREE.PointLight(0x00baff, 10)
 scene.add(pointLight)
 pointLight.position.y = 1

/**
 * Sizes
 */
const sizes = {
    width: window.innerWidth,
    height: window.innerHeight
}

/**
 * Camera
 */
const camera = new THREE.PerspectiveCamera(75, sizes.width / sizes.height)
camera.position.set(0,0,4)
scene.add(camera)

/**
 * Renderer
 */
const renderer = new THREE.WebGLRenderer({
    canvas : canvas,
    alpha : true
})
renderer.setSize(sizes.width, sizes.height)

let mouseY
window.addEventListener('mousemove', (e) =>
{
    mouseY =  + e.clientY  - window.innerHeight / 2
})

window.addEventListener('resize', () =>
{
    sizes.width = window.innerWidth
    sizes.height =  window.innerHeight
    renderer.setSize(sizes.width, sizes.height)
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
})
const animate = () =>
{
    plane.rotation.z += 0.005
    plane.material.displacementScale = 0.5 +mouseY * 0.0005
    renderer.render(scene, camera)
    requestAnimationFrame(animate)
}
animate()